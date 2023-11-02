<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xusuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'user_pass'
    ];
}