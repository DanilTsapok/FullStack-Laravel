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
        'description',
        'likes',
  
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }
    protected static function booted(){
        static::creating(function($post){
            $post->id = (string) Str::uuid();
        });
    }
}
