<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'Nafis Izzaqi',
                'email' => 'nafis@gmail.com',
                'subject' => 'Dafa',
                'message' => 'Ayo main ke Salatiga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dafa Khoirul Amin',
                'email' => 'dafa@gmail.com',
                'subject' => 'Nafis',
                'message' => 'Meluncur ke tempat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [ 
                'name' => 'Dafa Khoirul Amin',
                'email' => 'dafa@gmail.com',
                'subject' => 'Nafis',
                'message' => 'Meluncur ke tempat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
