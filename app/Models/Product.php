<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HashUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HashUuids;

    protected static function booted(){
        static::creating(function($product){
            $product->id=(string)Str::uuid();
        });
    }
}
