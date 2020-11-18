<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // fungsi register
    public function register(Request $request)
    {
        // email dan password yang diinputkan sesuai kriteria
        $this->validate($request, [
            'email_user' => 'required|unique:users|max:255',
            'password_user' => 'required|min:6'
        ]);

        $email = $request->input("email_user");
        $password = $request->input("password_user");
        $alamat = $request->input("alamat_user");
        $nama = $request->input("nama_user");
        $no_hp = $request->input("no_hp_user");

        //fungsi supaya password terenkripsi
        $hashPwd = Hash::make($password);
 
        $data = [
            "email_user" => $email,
            "password_user" => $hashPwd,
            "alamat_user" => $alamat,
            "nama_user" => $nama,
            "no_hp_user" => $no_hp
        ];
         
        if (UserModel::create($data)) {
            $out = [
                "message" => "Registered successfully",
                "code"    => 201,
            ];
        } else {
            $out = [
                "message" => "Register failed",
                "code"   => 404,
            ];
        }
 
        return response()->json($out, $out['code']);
    }

    // fungsi login
    public function login(Request $request)
    {
        $this->validate($request, [
            'email_user' => 'required',
            'password_user' => 'required|min:6'
        ]);
 
        $email = $request -> input("email_user");
        $password = $request -> input("password_user");
        
        $user = UserModel::where("email_user", $email)->first();
 
        if(!$user){
            $out = [
                "message" => "Login failed",
                "code"    => 401,
                "result"  => [
                    "token" => null,
                ]
            ];
            return response()->json($out, $out['code']);
        }
        
        if(Hash::check($password, $user->password_user)){
            $newtoken = $this -> generateRandomString();
 
            $user->update([
                'token' => $newtoken
            ]);
 
            $out = [
                'message' => 'Login success',
                'code'    => 200,
                'result'  => [
                    'token' => $newtoken,
                ]
            ];
        }
        else{
            $out = [
                "message" => "Login failed",
                "code"    => 401,
                "result"  => [
                    "token" => null,
                ]
            ];
        }
        return response()->json($out, $out['code']);
    }

    // untuk generate token
    function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
