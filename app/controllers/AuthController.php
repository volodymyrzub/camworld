<?php

class AuthController extends BaseController
{

    public function getLogin()
    {
        return View::make('admin.common.login');
    }

    public function postLogin()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );
        $data = Input::all();
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            return Redirect::route('get-login')->withErrors($validator);
        }
        $auth = Auth::attempt(
            array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ), true
        );

        if($auth){
            return Redirect::route('control-panel');
        }

        return 'Incorrect password or mail';

    }

    public function logout(){
        Auth::logout();
        return Redirect::route('get-login');
    }
}