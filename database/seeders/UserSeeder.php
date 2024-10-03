<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id'=> (string) Str::uuid(),
            'name'=> 'admin',
            'email'=>'admin@gmail.com',
            'role'=> 'admin',
            'password'=>bcrypt(env('ADMIN_PASSWORD')),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'id'=> (string) Str::uuid(),
            'name'=> 'user',
            'email'=>'user@gmail.com',
            'role'=> 'user',
            'password'=>bcrypt(env('ADMIN_PASSWORD')),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'id'=> (string) Str::uuid(),
            'name'=> 'editor',
            'email'=>'editor@gmail.com',
            'role'=> 'editor',
            'password'=>bcrypt(env('ADMIN_PASSWORD')),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
