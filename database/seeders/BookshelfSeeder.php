<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookshelves')->insert([
            'location' => 'A1',
            'active' => 1,
        ]);
    }
}
