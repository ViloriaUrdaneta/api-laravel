<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FirebaseToken;
use GuzzleHttp\Client;

class FirebaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:firebase-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification creation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

    
            $client = new Client();
            $firebaseApiKey = env('FCM_PRIVATE_KEY');

            $response = $client->post('https://fcm.googleapis.com/fcm/send', [
                'headers' => [
                    'Authorization' => 'key=' . $firebaseApiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'to' => 'dn8HP_q8SLOaV_SLQRq9X5:APA91bFefiwDqe_silcFmz-AEVhN9M0O6aWK5SMDXM29Yg4zkfljNBJDw_trIurjT99MIHBYUiFt6OPB_H7hiIW9mf80PYQ6yTmkbFfFgGDUjUmLBlv59hhaDpKGrHvuoyQfigLf33MC',
                    'notification' => [
                        'title' => 'Título de notificación automatizada',
                        'body' => 'Cuerpo de notificación automatizada',
                    ],
                ],
            ]);
        
    }
}



/**public function sendNotifications(Request $request){

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
    } */