<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    function tags(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => explode('|',$v)
        );
    }
}
