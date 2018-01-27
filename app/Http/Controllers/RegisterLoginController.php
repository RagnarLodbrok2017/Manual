<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Middleware;

class RegisterLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
//        if (Auth::guest())
//            return Redirect::to('../login');
//        return Redirect::to('../cars');
    }
public function showLogin(){
    return view('../login');
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
            if(Auth::attempt(['username'=>$request->username, 'password'=> $request->password, 'admin'=> 1])) {
                return Redirect::to('../cars');
            }elseif (Auth::attempt(['username'=>$request->username, 'password'=> $request->password, 'admin'=> 0])){
                return Redirect::to('../carsuser');
            }else{
                return back();
            }
//            if($user){
//                    if (Hash::check($request->password , $user->password)){
//                        return Redirect::to('../cars');
//                    }else{
//                        return back();
//                    }
//            }else{
//                return back();
//            }
        }
    }
    public function getLogout()
    {
        Auth::logout();
        Session::flush();
        //return Redirect::route('login');
        return Redirect::to('../login');
    }
}
