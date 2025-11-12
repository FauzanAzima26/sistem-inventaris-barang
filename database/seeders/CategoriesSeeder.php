<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Symfony\Polyfill\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'uuid' => Str::uuid(),
                'nama' => 'Elektronik',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sunt at distinctio, hic totam rem.',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'uuid' => Str::uuid(),
                'nama' => 'Furnitur',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sunt at distinctio, hic totam rem.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
