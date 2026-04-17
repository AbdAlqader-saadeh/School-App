<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =
    [
        'image',
        'name',
        'title',
        'text',
        'user_type',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user', 'book_id', 'user_id' , 'course_id');
    }
//
}
