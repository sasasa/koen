<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'saeki',
            'email' => 'masaakisaeki@gmail.com',
            'password' => bcrypt('hogehoge'),
            'email_verified_at' => now(),
        ]);
    }
}
