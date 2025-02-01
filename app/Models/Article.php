<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'author', 'slug', 'content', 'image'];

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($article) {
    //         $article->slug = Str::slug($article->title);
    //     });
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
