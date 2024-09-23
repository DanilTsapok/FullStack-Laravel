<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')-> insert([
            'id'=> (string)Str::uuid(),
            'name'=>'М’ясна піца',
            'image'=> 'https://primepizza.com.ua/wp-content/uploads/2021/03/d0bad0b2d0b0d0b4d180d0be-d0b4d0b8-d0bad0b0d180d0bdd0b5-large.png',
            'description'=>'Томатний соус, сир моцарела, салямі, балик, шинка, мисливські ковбаски, копчена грудка',
            'price'=> 230.00,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    
    
    }
}
