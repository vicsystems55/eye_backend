<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insertOrIgnore([

            [
                "name" => "Administrator",
                "email" => "admin@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "admin",
                "usercode" => "EYE000",
            ],

            [
                "name" => "Ade Michael",
                "email" => "mentor@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "mentor",
                "usercode" => "EYE111",
            ],

            [
                "name" => "Jane Doe",
                "email" => "mentor2@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "mentor",
                "usercode" => "EYE122",
            ],

            [
                "name" => "Jenny Awesome",
                "email" => "mentor3@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "mentor",
                "usercode" => "EYE133",
            ],

            [
                "name" => "Michael Bobley",
                "email" => "mentor4@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "mentor",
                "usercode" => "EYE144",
            ],

            [
                "name" => "Yuluk Peters",
                "email" => "judge@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "judge",
                "usercode" => "EYE166",
            ],

            
            [
                "name" => "Obi Peters",
                "email" => "judge2@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "judge",
                "usercode" => "EYE16236",
            ],

            [
                "name" => "Judge Tony",
                "email" => "judge3@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "judge",
                "usercode" => "EYE1116",
            ],

            [
                "name" => "Felix Johnson",
                "email" => "participant@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "participant",
                "usercode" => "EYE3312",
            ],

            [
                "name" => "Helen Patrick",
                "email" => "participant2@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "participant",
                "usercode" => "EYE333",
            ],

            [
                "name" => "Collins Attah",
                "email" => "participant3@icreate.com",
                'password' =>  Hash::make('icreate2021'),
                "role" => "participant",
                "usercode" => "EYE334",
            ],
        
        
        ]);
    }
}
