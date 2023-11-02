<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class XUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('x_usuarios')->insert([
            ['user_email' => 'juan@jara.cl', 'user_pass' => 'juan2023'],
            ['user_email' => 'paty@parra.cl', 'user_pass' => 'patty2023'],
            ['user_email' => 'nelly@nunez.cl', 'user_pass' => 'nelly2023'],
        ]);
    }
}
