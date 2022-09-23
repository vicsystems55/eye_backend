<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\UserProfile;

use App\Models\Notification;


class UserProfileController extends Controller
{
    //


    public function users(Request $request)
    {
        # code...

        try {
            //code...

            if ($request->usercode) {
                # code...


                // return $request->usercode;

                $user = User::with('profile')->where('usercode', $request->usercode)->first();
        
                return $user;


            }

            if ($request->user()->role != 'admin') {
                # code...

                $user = User::with('profile')->find($request->user()->id);
        
                return $user;

            }else{

                $users = User::latest()->get();
        
                return $users;

            }


        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }

    public function update_profile(Request $request)
    {

        
        try {
            //code...

            if ($request->type == 'video') {
                # code...

                $video = 
                UserProfile::where('user_id', $request->user()->id)
                ->update(['social_link' => $request->social_link]);
                
                return $request->social_link;
    
    
            }
            
            if($request->user()->role == 'admin' && $request->usercode){

                $profile = User::where('usercode', $request->usercode)->update([
                    'stage1' => 1
                ]);

                $user = User::where('usercode', $request->usercode)->first();

                $notification = Notification::updateOrCreate([
                    'user_id' => $user->id,
                    'title' => 'Profile Verified'
                ],[
                    'title' => 'Profile Verified',

                    'message' => '🎉 Congratulations!! Your profile has been verified.'
                ]
            );

                return $profile;

            }
            
            else{

                $profile = UserProfile::updateOrCreate([
                    'user_id' => $request->user()->id
        
                ],[
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'country' => $request->country,
                    'state' => $request->state,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'social_link' => $request->social_link,
                    'facebook_url' => $request->facebook_url,
                    'twitter_url' => $request->twitter_url,
                    'linkedin_url' => $request->linkedin_url,
                    'youtube_url' => $request->youtube_url,
                    'bio' => $request->bio,
                    'language' => $request->language,
                    'level_education' => $request->level_education,
                    'existing_business' => $request->existing_business,
                    'business_name' => $request->business_name,
                    'business_registration_status' => $request->business_registration_status,
                    'years_in_business' => $request->years_in_business,
                    'gross_revenue' => $request->gross_revenue,
                    'industry' => $request->industry,
                    'business_description' => $request->business_description,
                    'business_problems' => json_encode($request->business_problems, true),
                    'in_partnership' => $request->in_partnership,
                    'seeking_cofounder' => $request->seeking_cofounder,
                    'business_industry' => $request->business_industry,
                    'challenges' => json_encode($request->challenges),
                    'other_challenges' => $request->other_challenges,
                    'hope_to_gain' => $request->hope_to_gain,
        
                ]);
                
                
                return $profile;
            }




        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }


    }



}
