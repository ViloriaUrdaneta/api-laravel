<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class X_usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'user_pass'
    ];


}
