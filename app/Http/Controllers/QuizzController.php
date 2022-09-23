<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quizz;

class QuizzController extends Controller
{
    //

    public function get_quizes(Request $request)
    {
        # code...

        try {
            //code...

            $quizes = Quizz::latest()->get();
    
            return $quizes;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }

    public function create_quiz(Request $request)
    {
        # code...

        try {
            //code...
            $quiz = Quizz::create([
                'question' => $request->question,
                'answer' => $request->optiona,
                'a' => $request->optiona,
                'b' => $request->optionb,
                'c' => $request->optionc,
                'd' => $request->optiond,
                'e' => $request->optione,
                'duration' => 10,
                'module_id' => $request->module_id,
            ]);
    
            return $quiz;

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }

    
}
