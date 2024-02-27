<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReactionType extends Model
{
    use HasFactory;

    use SoftDeletes;

    function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
