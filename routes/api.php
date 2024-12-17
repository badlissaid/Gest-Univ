<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[\App\Http\Controllers\API\Login::class,'login']);
Route::post('logout',[\App\Http\Controllers\API\Login::class,'logout'])->middleware('auth:sanctum');
Route::put('user/add',[\App\Http\Controllers\User::class,'store'])->middleware('auth:sanctum');
//Route::get('user/info/update',function(Request $request){return response()->json($request->user()) ;})->middleware('auth:sanctum');
Route::post('user/update',[\App\Http\Controllers\User::class,'update'])->middleware('auth:sanctum');
Route::get('display',[\App\Http\Controllers\User::class,'index'])->middleware('auth:sanctum');

