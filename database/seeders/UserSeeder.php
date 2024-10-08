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
            'name'=> 'Danil',
            'email'=>'danya@gmail.com',
            'password'=>bcrypt('danya2004'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('users')->insert([
            'id'=> (string) Str::uuid(),
            'name'=> 'DanilAdmin',
            'email'=>'danyaAdmin@gmail.com',
            'password'=>bcrypt('danya20041'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
