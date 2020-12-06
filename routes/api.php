<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\User ;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/auth', function (Request $request) {

    if (
        !$request->get('username') ||
        !$request->get('password')
    ){
        return response()->json([
            'error' => 'username or password missing' ,
        ],200);
    }

    $user = User::where('phone', $request->get('username'))->first();

    if ( !$user || !Hash::check($request->get('password'), $user->password) )
        return response()->json([
            'error' => 'The provided credentials are incorrect.'
        ],200);

    $user->tokens()->delete();

    $token = $user->createToken('token-name');

    return response()->json([
        'user' => $user ,
        'token' => $token->plainTextToken
    ],200);

});

Route::middleware('api_auth')->get('/partners' ,function (Request $request){

    $partners = \App\Models\UpdatedPartner::all()->toArray() ;

    return response()->json([
        'partners' => $partners
    ],200);
});
