<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    protected $fillable =
    [
        'name',
        'email',
        'password',
    ];

    protected $guard = 'student';
    protected $hidden = [
        'password', 'remember_token',
    ];
}
