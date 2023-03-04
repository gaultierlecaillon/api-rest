<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login The User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'username' => 'required',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            //$pwd = "123456";
            //$hashed = Hash::make($pwd);
            //dd(Hash::check($pwd, '$2y$10$TBRtbPZfepCRNVVfdeBDPOn1IpMqV.47H20lvonvOoYgN9UzYDnJ6'));

            if(!Auth::attempt(['username' => 'john', 'password' => '123456'])){
                return response()->json([
                    'status' => false,
                    'message' => 'Username & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('username', $request->username)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
