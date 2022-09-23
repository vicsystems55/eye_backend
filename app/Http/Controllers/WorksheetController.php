<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Worksheet;

use Illuminate\Support\Str;


class WorksheetController extends Controller
{
    //

    public function create_worksheet(Request $request)
    {
        # code...

        return $request->all();

        try {
            //code...

            $worksheet = Worksheet::create([
    
                'module_id' => $request->module_id,
                'worksheet_code' => Str::random(5),
                'theme' => $request->theme,
                'exercise' => $request->exercise,
                'category' => $request->category,
                'question_type' => $request->question_type,
                'question' => $request->question,
                'description' => $request->description,
                'prefered_answer' => $request->prefered_answer,
    
            ]);
    
    
            return $worksheet;

        } catch (\Throwable $th) {
            //throw $th;
        }



    }

    public function get_worksheets(Request $request)
    {
        # code...

        try {
            //code...

            $module = Module::where('module_code', $request->module_code)->first();

            $worksheets = Worksheet::where('module_id', $module->id)->latest()->get();
    
            return $worksheets;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }



    }
}
