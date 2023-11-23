<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\AuthenticationInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;





class AuthenticationController extends Controller
{
    use GeneralTrait;

    private AuthenticationInterface $authinterface;

    public function __construct(AuthenticationInterface $authinterface)
    {
        $this->authinterface = $authinterface;
    }


    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Login",
     *     description="Authenticate user and return access token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", format="email", description="User's email"),
     *             @OA\Property(property="password", type="string", format="password", description="User's password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login successful"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */


    
    public function login(LoginRequest $request){
        try{

            $token = $this->authinterface->login($request);
            return $this->getToken($token);

        }catch(Exception $e){
            $this->getError($e->getCode(),$e->getMessage());
        }
    }



    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="Register",
     *     description="Register a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", description="User's name"),
     *             @OA\Property(property="email", type="string", format="email", description="User's email"),
     *             @OA\Property(property="password", type="string", format="password", description="User's password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */

    public function register(RegisterRequest $request){
        try{
        
        $token = $this->authinterface->register($request);
        return $this->getToken($token);

        }catch(Exception $e){
            $this->getError($e->getCode(),$e->getMessage());
        }
    }




    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     summary="Logout",
     *     description="Invalidate the user's token",
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Logout successful"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     )
     * )
     */

    public function logout(Request $request){
        try{

            $this->authinterface->logout($request);
            return $this->loggedout();
            
        }catch(Exception $e){
            $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
