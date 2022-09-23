<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuizzAnswer;

use App\Models\Quizz;


class QuizzAnswerController extends Controller
{
    //

    public function submitAnswer(Request $request)
    {
        # code...

        // try {
        //     //code...
        // return $request->answers[0];

        // } catch (\Throwable $th) {
        //     //throw $th;

        //     return $th;
        // }
        try {
            //code...
            
            foreach ($request->answers as $answer) {

                $quiz = Quizz::find($answer['quiz_id']);
        
                $mark = 0;
                # code...
                if ($answer['quiz_answer'] == $quiz->answer) {
                    # code...
        
                    $mark = 5; 
                }
        
                $quiz_answer = QuizzAnswer::create([
                    'user_id' => $answer['user_id'],
                    'quiz_id' => $answer['quiz_id'],
                    'quiz_answer' => $answer['quiz_answer'],
                    'mark' => $mark
                ]);
    
                // $quiz_answer;
            }

            return $quiz_answer;
    

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }



    }
}
