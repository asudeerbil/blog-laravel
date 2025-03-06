<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'content',
        'hit',
        'status',
        'slug',
    ];

    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
