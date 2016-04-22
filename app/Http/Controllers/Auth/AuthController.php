<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

/*    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/





    public function getLogin() {
        return view('auth.login');
    }
    

    public function postLogin(Request $request) {
        $rules = array(
            'email'    => 'required|email', 
            'password' => 'required|alphaNum|min:3'
            );


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password')); 
        } else {

            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
                );

            if (Auth::attempt($userdata)) {

                Auth::login(Auth::user());
                Session::flash('success', 'Добро пожаловать, ' . Auth::user()->name);
                return redirect('/');

            } else {
                return Redirect::to('login');
            }

        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('front.index');
    }

    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->roles()->attach(Role::where('name', 'User')->first());
        Auth::login($user);
    }

}