<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterLoginController extends Controller
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
        $user->password = Hash::make($request->password);
        $user->save();
        return back();
    }

    //check login
    public function check(Request $request)
    {
        $data = Input::except(array('_token'));
        $user = User::where('username',$request->username)->first();
        $rules = array(
            'username' =>'required|string|max:255',
            'password' => 'required|string|min:6',
        );
        $message = array(
            'username.required' => 'The username is required.',
            'password.required' => 'Please Enter A Valid Password',
        );
        $validator = Validator::make($data,$rules,$message);
        if($validator->fails(true))
        {
            return Redirect::to('login')->WithErrors($validator);
        }else{
            if($user){
                if (Hash::check($request->password , $user->password)){
                    return view('cars');
                }else{
                    return back();
                }
            }else{
                return back();
            }
        }
    }
}
