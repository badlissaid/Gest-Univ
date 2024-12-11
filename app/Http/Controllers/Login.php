<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email ,
            'password' => $request->password
        ];
        // dd ($credentials);
        if(Auth::attempt($credentials)){
            $type = User::where('email',$request->email)->first();
            if ($type['type'] == 0){
                return 'admin' ;
            }elseif ($type['type'] == 1){
                return 'techer';
            }elseif ($type['type'] == 2){
                return 'student';
            }else{
                return 'Error';
            }
        }else{
            return 'Error Login';
        }
    }
}
