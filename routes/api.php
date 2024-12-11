<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[\App\Http\Controllers\Login::class,'login']);
Route::put('add',[\App\Http\Controllers\User::class,'store']);
Route::get('dispaly',function (){
     $for = \App\Models\User::get();
    return response()->json($for);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
