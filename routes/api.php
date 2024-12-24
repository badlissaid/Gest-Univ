<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

Route::post('login',[\App\Http\Controllers\API\Login::class,'login']);
Route::post('logout',[\App\Http\Controllers\API\Login::class,'logout'])->middleware('auth:sanctum');
Route::put('user/add',[\App\Http\Controllers\User::class,'store']);
//Route::get('user/info/update',function(Request $request){return response()->json($request->user()) ;})->middleware('auth:sanctum');
Route::post('user/update',[\App\Http\Controllers\User::class,'update'])->middleware('auth:sanctum');
Route::get('user/list',[\App\Http\Controllers\User::class,'index'])->middleware('auth:sanctum');

Route::get('projects',[\App\Http\Controllers\User::class,'display_project'])->middleware('auth:sanctum');


Route::get('groups/{id}', [GroupController::class, 'show'])->middleware('auth:sanctum');
Route::post('groups', [GroupController::class, 'store'])->middleware('auth:sanctum');

