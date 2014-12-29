<?php
/**
 * Created by PhpStorm.
 * User: manpro
 * Date: 23.12.2014
 * Time: 15:04
 */

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            'name' =>'admin',
            'email' => 'admin@mail.ru',
            'password' =>Hash::make('1111'),
        );
        DB::table('users')->insert($users);
    }

}