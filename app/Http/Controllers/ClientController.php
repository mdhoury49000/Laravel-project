<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function authentifierUtilisateur(Request $request){
        $infoClient=Client::where('MAIL',$request->email)->first();
        if(!$infoClient){
            return response()->json([
                'message' => 'Email does not exist. Please retry'], 404);
        }

        if(password_verify($request->motdepasse,$infoClient->MDP)){
            return response()->json($infoClient);
        }
        else {
            return response()->json([
                'message' => 'Password is not matching with the email Not Found. If error persists, contact info@website.com'], 404);
        }
    }

    function ModifClient(Request $request){
      if($request->password1 == $request->password2){
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = $request->password1;
          $user->save();
          return response()->json([
              'message' => 'Profil modifié avec succès !']);
      }
    }
}
