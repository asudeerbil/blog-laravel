<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'slug',
        'order',
        
    ];
}
