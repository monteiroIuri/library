<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BookshelfSeeder::class);
        \App\Models\Bookshelf::factory()->count(2)->create();
    }
}
