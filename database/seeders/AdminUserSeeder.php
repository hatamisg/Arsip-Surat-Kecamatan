<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Kantor',
            'email'=> 'admin@mail.test',
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create([
            'name' => 'Staf 1',
            'email'=> 'staf1@mail.test',
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create([
            'name' => 'Staf 2',
            'email'=> 'staf2@mail.test',
            'password' => bcrypt('12345678'),
        ]);
        $user->assignRole('admin');
    }
}
