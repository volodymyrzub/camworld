<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    protected $table = 'users';

    protected $hidden = array('password', 'remember_token');

    public static function getNameUserById($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        return $user->name;
    }

    public static function login($param)
    {
       if(Auth::attempt(array('email' => $param['email'], 'password' => $param['password']), true)){
            return Auth::user();
       }
        else{
            return false;
        }
    }
}
