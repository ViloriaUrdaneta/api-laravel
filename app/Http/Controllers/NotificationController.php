<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use GuzzleHttp\Client;
use App\Models\X_usuario;


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

    public function postNotifications(Request $request){

        $notification = new Notification();
        $notification->title = $request->title;
        $notification->text = $request->body;
        $notification->created_at = now(); 
        $notification->save();

        $notifications = Notification::all();
        return response()->json($notifications);
    }


    public function sendNotifications(Request $request){

        $xusuario_name = $request->usuario;
        $title = $request->title;
        $body = $request->body;

        $xusuario = X_usuario::where('user_email', $xusuario_name)->first();
        $fcmtoken = $xusuario->fcm_token;

        $client = new Client();
        $firebaseApiKey = env('FCM_PRIVATE_KEY');

        $response = $client->post('https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Authorization' => 'key=' . $firebaseApiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'to' => $fcmtoken,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody());
        
        return redirect(route('notification.create'));
    }
};


