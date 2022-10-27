<?php

namespace App\Models;

// use App\Models\Category;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santris';
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'user_id',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'image',
        'status',
        'published_at',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
        //satu posts hanya punya satu admin
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
        //satu santri punya satu category
    }
}
