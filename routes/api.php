<?php

use App\Http\Controllers\api\RequestController;
use App\Mail\RegisterSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registerApi', function(Request $request){
    $email = $request->email;
    $name = $request->name;

    Mail::to($email)->send(new RegisterSuccess($name));

    return response()->json([
        'success' => true,
    ]);
});

Route::resource('request', RequestController::class );
