<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function __construct()
    {

    }
    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' =>'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();
        return back();
    }
    public function check(Request $request)
    {
        $user = User::Where('username' , $request->username);
        if($user)
        {
            $password = bcrypt($request->password);
            if($user->password == $password)
                return redirect('/index');
            else
                echo "Please Enter a Valid Information";
        }
    }
}
