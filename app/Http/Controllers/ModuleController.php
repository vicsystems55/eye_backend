<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Module;

use Illuminate\Support\Str;

class ModuleController extends Controller
{
    //

    public function create_module(Request $request)
    {
       


        // return $request->all();

        try {

            $request->validate([
                'title' => 'required',
                // 'amount' => 'required|numeric|min:99700|between:0,99.99',
                // 'number_of_accounts' => 'required|numeric|min:1|max:15',
                'featured_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:50000',
                
            ]);
    
            $doc = $request->file('featured_image');
    
            
            $new_name = rand().".".$doc->getClientOriginalExtension();
            
            $file1 = $doc->move(public_path('featured_images'), $new_name);


            
            $module = Module::create([
                'featured_image' => config('app.url').'featured_images/'.$new_name,
                'module_code' => Str::random(5),
                'title' => $request->title,
                'description' => $request->description,
                'course_body' => $request->course_body,
                'status' => 'active',
                'running_session_id' => $request->running_session_id,
            ]);
    
            return $module;
            

        } catch (\Throwable $th) {
            //throw $th;


            return $th;


        }



        
    }

    public function modules(Request $request)
    {
        # code...



        try {
            //code...
            if ($request->module_code) {
                # code...
    
                $module = Module::with('worksheets')->with('quizzes')->where('module_code', $request->module_code)->first();
    
                return $module;
    
    
            }else {
                # code...
    
                $modules = Module::with('worksheets')->with('quizzes')->latest()->get();
    
                return $modules;
    
    
            }
        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }

    public function update_module(Request $request, Module $module)
    {
        # code...

        // return $request->all();

        try {

            $request->validate([
                'title' => 'required',
                // 'amount' => 'required|numeric|min:99700|between:0,99.99',
                // 'number_of_accounts' => 'required|numeric|min:1|max:15',
                // 'featured_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:50000',
                
            ]);
    
            try {
                //code...
                $doc = $request->file('featured_image');
    
            
                $new_name = rand().".".$doc->getClientOriginalExtension();
                
                $file1 = $doc->move(public_path('featured_images'), $new_name);
            } catch (\Throwable $th) {
                //throw $th;

                $new_name = null;
            }

            $modulex = Module::where('module_code', $request->module_code)->first();


            
            $module = Module::where('module_code', $request->module_code)->update([
                'featured_image' => $new_name?(config('app.url').'featured_images/'.$new_name):$modulex->featured_image,
                'title' => $request->title,
                'description' => $request->description,
                'course_body' => $request->course_body,
                'status' => 'active',
                // 'running_session_id' => '',
            ]);
    
            return $module;
            

        } catch (\Throwable $th) {
            //throw $th;


            return $th;


        }


    }
}
