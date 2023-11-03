<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationController extends Controller
{
    public function index(){
        /*return view('notifications.index');*/
        $users = User::all();
        return response()->json($users);
    }

    public function users(Request $request){
        
        $users = User::all();
        return response()->json($users);
    }

    public function create(){
        return view('notifications.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => "required",
            'text' => "required",
        ]);

        $newNotification = Notification::create($data);

        return redirect(route('notification.index'));
    }

    public function getNotifications(){
        $notifications = Notification::all();
        return response()->json($notifications);
    }
};


