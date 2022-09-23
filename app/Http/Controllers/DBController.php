<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Config;

use Artisan;

use DB;

class DBController extends Controller
{
    //

    public function switch_db(Request $request)
    {
        # code...

        // $connection = Config::set('database.default', 'mysql2');

        $config = Config::set('database.connections.mysql.database', 'multipledb');

        DB::disconnect('mysql');



        // $config['database'] = "mysql2";
        // $purged = DB::purge('mysql');
    //     // $config['password'] = "";
        // $connection = Config::set('database.default', 'mysql2');


    //    Artisan::call('config:cache');
    //    Artisan::call('cache:clear');

    

        

        return  Config::get('database.connections.mysql');
    }
}
