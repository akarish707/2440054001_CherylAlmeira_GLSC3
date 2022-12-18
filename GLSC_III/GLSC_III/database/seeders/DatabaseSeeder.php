<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlbumPicture;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlbumPictureSeeder::class,
        ]);
    }
}
