<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;


    function replies()
    {
        return $this->hasMany(Reply::class);

        // same as query: 
        // SELECT * FROM comments c JOIN replies r ON c.id = r.comment_id

    }

    function post()
    {
        return $this->belongsTo(Post::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);

        // same as query:
        // SELECT * FROM comments c JOIN users u ON c.user_id = u.id
    }
}
