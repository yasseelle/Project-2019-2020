<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users_table;

class User_tableController extends Controller
{
    public function NewUser()
    {
        $newUser= new Users_table();
        $newUser->name = "ilyass";
        $newUser->lastname = "jabbari";
        $newUser->email = "iyass.jabbari.me@gmail.com";
        $newUser->password = "123";
        $newUser->user_profile_img = "";                
        $newUser->role = "ADMIN";
        $newUser->phone_number= "ADMIN";
        $newUser->cuntry = "Morocco";
        $newUser->city = "ifrane";
        $newUser->birth_day = "";
        
        $newUser->save();

    }

    public function lstUsers()
    {
        $users = Users_table::all();
        dd($users);
    }
}
