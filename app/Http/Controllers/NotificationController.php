<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    //

    public function notifications(Request $request)
    {
        # code...

        try {
            //code...
            if ($request->unread) {
                # code...
    
                $notifications = Notification::where('user_id', $request->user()->id)->where('status', 'unread')->latest()->get();
    
                return $notifications;
    
            }if ($request->read) {
                # code...
    
                $notificationx = Notification::where('user_id', $request->user()->id)->where('status', 'unread')->update([
                    'status' => 'read'
                ]);
    
                $notifications = Notification::where('user_id', $request->user()->id)->latest()->get();
    
                return $notifications;
                
            }else {
                # code...
    
                $notifications = Notification::where('user_id', $request->user()->id)->latest()->get();
        
                return $notifications;
            }

        } catch (\Throwable $th) {
            //throw $th;

            return $th;
        }

    }
}
