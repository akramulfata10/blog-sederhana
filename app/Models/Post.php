<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'name',
        'slug',
        'body',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
        //satu posts hanya punya satu admin
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
        //satu postingan punya satu category
    }

}
