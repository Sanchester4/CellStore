<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345')
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'user@user.com',
            'password' => Hash::make('12345')
        ]);

        $user->assignRole('user');
    }
}
