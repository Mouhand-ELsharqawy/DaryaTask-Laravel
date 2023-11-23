<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AuthenticationInterface;
use Illuminate\Support\Facades\Hash;

class AuthenticationRepository implements AuthenticationInterface {

    public function login(LoginRequest $request){
        $user = User::where('email',$request->email) ->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'massage' => 'the Provided Credentials are incorrect'
            ]);
        }

        $token = $user->createToken('auth_token')->accessToken;

        return $token;
    }


    public function register(RegisterRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->accessToken;

        return $token;
    }


    public function logout(Request $request){
        return $request->user()->token()->revoke();
    }
}