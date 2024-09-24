<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable =[
        'name',
        'image',
        'description',
        'price',
        'stock'
    ];

    protected static function booted(){
        static::creating(function($product){
            $product->id = (string) Str::uuid();
        });
    }
}
