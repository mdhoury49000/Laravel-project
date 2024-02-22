<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ValidateSignature;
use App\Mail\TestEmail;
use App\Models\tokenid;
use App\Models\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                    'password2' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if($request->password == $request->password2){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Passwords do NOT match',
                ], 401);
            }


            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN",['client'])->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN",['client'])->plainTextToken,
                'idClient' => $user->id,
                'emailClient' => $user->email,
                'nomClient' => $user->name
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    // ----------------------------------------------------------------
    // Deconnecte le client a l'aide de son token
    // ----------------------------------------------------------------
    public function logoutClient(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json(
            [
                'message' => 'Deconnecté'
            ]
        );
    }

    function ModifClient(Request $request){
        $userInfo = User::where('email', $request->email)->first();
        dd($userInfo);
        if($userInfo->password == $request->passwordVerif){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->emailModif;
            $user->save();
            return response()->json([
                'message' => 'Profil modifié avec succès !']);
        }
    }



    public function email(){
        $mailData = [

            "Code" => Str::random(5),
        ];

        Mail::to("hello@example.com")->send(new TestEmail($mailData));

        dd("Mail Sent Successfully!");
    }

}
