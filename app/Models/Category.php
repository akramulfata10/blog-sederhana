<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status'];

    public function santri()
    {
        return $this->hasMany(Santri::class);
        //satu category bisa saja dimilik oleh banyak santri
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
        //satu category bisa saja dimilik oleh banyak post
    }

}
