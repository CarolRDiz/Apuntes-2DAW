<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'image_id',
        'content',
        'user_id'
    ];

    use HasFactory;

    public function user() { 
        return $this->belongsTo(User::class); 
    }
    public function image() { 
        return $this->belongsTo(Image::class); 
    } 
}
