<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //      DB::table('users')->insert([
        //         'first_name' => 'rin@gmail.com',
        //          'last_name' => 'rin@gmail.com',
        //          'email' => 'rin@gmail.com',
        //          'password' => Hash::make('123456'),
        //      ]);


        // DB::table('categories')->insert([
        //     'id' => '1',
        //     'name' => 'Sách Minano Nihongo',
        // ]);

        // DB::table('books')->insert([
        //     'name' => 'Minano Nihongo N5',
        //     'img' => '',
        //     'category_id' => 1,

        // ]);

        // DB::table('books')->insert([
        //     'name' => 'Minano Nihongo N4',
        //     'img' => '',
        //     'category_id' => 1,
        // ]);
        // DB::table('books')->insert([
        //     'name' => 'Minano Nihongo N3',
        //     'img' => '',
        //     'category_id' => 1,

        //  ]);

            // for($i = 0  ; $i < 1000 ; ++$i){
            //     DB::table('categories')->insert([
            //         'name' =>'Category ' . ($i +1),
            //     ]);
            // }

                DB::table('grm_examples')->insert([
                    'japanese' =>' みんなの日本語 ' ,
                    'vietnamese' => 'ngu phap',
                    'grammar_id' => 1,
                ]);
            

    }
}
