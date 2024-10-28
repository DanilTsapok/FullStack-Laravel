<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    
    protected $fillable =[
        'name',
        'image',
        'description',
        'likes',
  
    ];

    protected static function booted(){
        static::creating(function($post){
            $post->id = (string) Str::uuid();
        });
    }
}
