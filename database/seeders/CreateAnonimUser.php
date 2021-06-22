<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAnonimUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'anonim@anonim.com',
            'name' => 'Аноним',
            'password' => bcrypt('password')
        ]);
    }
}
