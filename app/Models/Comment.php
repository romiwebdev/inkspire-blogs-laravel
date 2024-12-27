<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use HasFactory;

    protected $fillable = ['name', 'post_id', 'content'];

    // Relasi dengan Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
