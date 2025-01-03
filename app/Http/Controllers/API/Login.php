<?php

//namespace App\Http\Controllers;
//
//use App\Models\User;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class Login extends Controller
//{
//    public function login(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email' ,
//            'password' => 'required'
//        ]);
//        $credentials = [
//            'email' => $request->email ,
//            'password' => $request->password
//        ];
//        // dd ($credentials);
//        if(Auth::attempt($credentials)){
//            $type = User::where('email',$request->email)->first();
//            if ($type['type'] == 0){
//                return 'admin' ;
//            }elseif ($type['type'] == 1){
//                return 'techer';
//            }elseif ($type['type'] == 2){
//                return 'student';
//            }else{
//                return 'Error' ;
//            }
//        }else{
//            return 'Error Login';
//        }
//    }
//app\Http\Controllers\API\ApiController.php

namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use GuzzleHttp\Promise\Create;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
//    public function register(Request $request)
//    {
//        try {
//            $validateuser = Validator::make($request->all(),
//                [
//                    'email' => 'required|email|unique:users,email',
//                    'password' => 'required',
//                ]
//            );
//
//            if ($validateuser->fails()) {
//                return response()->json([
//                    'status' => false,
//                    'message' => 'validation error',
//                    'errors' => $validateuser->errors()
//                ],401);
//            }
//
//            $user = User::create([
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' => $request->password,
//            ]);
//
//            return response()->json([
//                'status' => true,
//                'message' => 'User created Succesfully',
//                'token' => $user->createToken('API TOKEN')->plainTextToken
//            ], 200);
//        } catch (\Throwable $th) {
//            // Return Json Response
//            return response()->json([
//                'status' => false,
//                'message' => $th->getMessage(),
//            ], 500);
//        }
//    }

    public function login(Request $request)
    {
        try {
            $validateuser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required',
                ]
            );

            if ($validateuser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateuser->errors()
                ], 401);
            }

            if (!Auth::attempt(($request->only(['email','password'])))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went really wrong!',
                ],401);
            }

            $user = User::where('email', $request->email)->first();
            $type = $user->type ;
            switch ($type){
                case 0 :
                    return response()->json([
                        'status' => true,
                        'message' => 'Succesfully login',
                        'type' => $type,
                        'token' => $user->createToken('API TOKEN',['Admin'])->plainTextToken
                    ], 200);
                break;
                case 1 :
                    return response()->json([
                        'status' => true,
                        'message' => 'Succesfully login',
                        'type' => $type,
                        'token' => $user->createToken('API TOKEN',['Teacher'])->plainTextToken
                    ], 200);
                    break;
                case 2 :
                    return response()->json([
                        'status' => true,
                        'message' => 'Succesfully login',
                        'type' => $type,
                        'token' => $user->createToken('API TOKEN',['Student'])->plainTextToken
                    ], 200);
                    break;
            }

        } catch (\Throwable $th) {
            // Return Json Response
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function profile()
    {
        // Profile Detail
        $userData = auth()->user();

        // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Profile Info',
            'data' => $userData,
            'id' => auth()->user()->id,
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Successfully Logout',
            'data' => []
        ], 200);
    }
}
