<?php

namespace App\Traits;

trait GeneralTrait {
    public function getData($key, $data){
        return response()->json([
            'status' => true,
            'msg' => 'Success',
            $key => $data
        ]);
    }

    public function getToken($token){
        return response()->json([
            'token' => $token,
            'msg' => 'Token Created',
            'status' => true
        ]);
        
    }

    public function deleteData(){
        return response()->json([
            'status' => true,
            'msg' => 'Success',
            "ok" => 'Culomn Data Removed'
        ]);
    }

    public function getError($errorcode,$errormessage){
        return response()->json([
            'status' => false,
            'errcode' => $errorcode,
            'msg' => 'Faild',
            'errors' => $errormessage
        ]);
    }

    public function loggedout(){
        return response()->json([
            'token' => 'Token Removed',
            'msg' => 'User Logged Out',
            'status' => true
        ]);
    }
}