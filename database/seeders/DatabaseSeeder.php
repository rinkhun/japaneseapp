<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'Sách Minano Nihongo',
        ]);

        DB::table('books')->insert([
            'name' => 'Minano Nihongo N5',
            'img' => '',
            'category_id' => 1,

        ]);

        DB::table('books')->insert([
            'name' => 'Minano Nihongo N4',
            'img' => '',
            'category_id' => 1,
        ]);
        DB::table('books')->insert([
            'name' => 'Minano Nihongo N3',
            'img' => '',
            'category_id' => 1,

        ]);
    }
}
