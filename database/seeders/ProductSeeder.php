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
            'stock'=> 230,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    
        DB::table('products')-> insert([
            'id'=> (string)Str::uuid(),
            'name'=>'Піца «Сирна насолода»',
            'image'=> 'https://primepizza.com.ua/wp-content/uploads/2021/03/IMG_1867_jpg-removebg-preview.png',
            'description'=>'Вершковий соус, сир моцарела, сир гауда, сир сулугуні, сир дор-блю, сир мармуровий, пармезан.',
            'price'=> 220.00,
            'stock'=> 230,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')-> insert([
            'id'=> (string)Str::uuid(),
            'name'=>'«Гавайська» з ананасами',
            'image'=> 'https://primepizza.com.ua/wp-content/uploads/2021/07/img_20240426_152338_685-removebg-preview-1.png',
            'description'=>'Вершковий соус, сир моцарела, ананаси, грудка копчена, кукурудза.',
            'price'=> 210.00,
            'stock'=> 230,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
