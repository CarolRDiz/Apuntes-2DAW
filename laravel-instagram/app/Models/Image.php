<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_path',
        'description',
        'user_id'
    ];

    use HasFactory;
    public function user() { 
        return $this->belongsTo(User::class); 
    }
    public function likes() { 
        return $this->hasMany(Like::class); 
    }
    public function comments() { 
        return $this->hasMany(Comment::class); 
    } 
}
