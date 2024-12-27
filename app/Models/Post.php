<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'author_id', 'views'];
    protected $dates = ['created_at', 'updated_at'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    // Relasi dengan Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

