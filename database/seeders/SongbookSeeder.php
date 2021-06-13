<?php

namespace Database\Seeders;

use App\Models\Songbook;
use Illuminate\Database\Seeder;

class SongbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Songbook::factory()->count(15)->hasSongs(5)->create();
    }
}
