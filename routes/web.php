<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [\App\Http\Controllers\BAR::class, 'test']);
Route::get('/random', ['App\Http\Controllers\Api\AuthController', 'random']);
Route::get('send-email', ['App\Http\Controllers\CommandeController', 'email']);
Route::get('send-email', function(){
    $mailData = [
        "name" => "Test NAME",
        "dob" => "12/12/1990"
    ];

    Mail::to("hello@example.com")->send(new TestEmail($mailData));

    dd("Mail Sent Successfully!");
});
