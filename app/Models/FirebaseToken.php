<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirebaseToken extends Model
{
    use HasFactory;

    protected $table = 'firebase_tokens'; // Especifica el nombre de la tabla
    protected $fillable = ['token'];

    public static function getToken(){
        return FirebaseToken::first(); // Obtén el primer registro de la tabla
    }
}
