<?php 

namespace App\Repositories\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

interface AuthenticationInterface {
    public function login(LoginRequest $request);
    public function register(RegisterRequest $request);
    public function logout(Request $request);
}