<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    public function __construct(){
        $this->middleware("login");
    }

    public function index(){
        return "Sucessfully logged in";
    }
}