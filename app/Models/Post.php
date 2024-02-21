<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function post_status()
    {
        return $this->belongsTo(PostStatus::class);
    }
}
