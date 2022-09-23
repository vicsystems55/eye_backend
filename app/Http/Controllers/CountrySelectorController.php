<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;

class CountrySelectorController extends Controller
{
    //

    public function countries(Request $request)
    {

        if($request->country_id){

            $states = DB::table('states')->where('country_id', $request->country_id)->get();

            return $states;

        }else {
            # code...
            $countries = DB::table('countries')->where('region', 'Africa')->get();
    
            return $countries;
        }
        


    }
}
