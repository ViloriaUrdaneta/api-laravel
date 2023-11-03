<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir los datos de prueba para la tabla "notifications"
        $notifications = [
            [
                'title' => 'Notificación 1',
                'text' => 'Texto de la notificación 1',
            ],
            [
                'title' => 'Notificación 2',
                'text' => 'Texto de la notificación 2',
            ],
            // Agrega más notificaciones según sea necesario
        ];

        // Insertar los registros en la tabla "notifications"
        DB::table('notifications')->insert($notifications);
    }
}
