<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class CreateDefaultImg extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::insert(
            [
                ['name' => 'image/default.jpg'],
                ['name' => 'image/unknown.png']
            ]
        );
    }
}
