<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Super-Admin']);

        $user = User::create([
            'name' => 'Prince Charles',
            'email' => 'iamsoboy@gmail.com',
            'username' => 'brainandpaper',
            'password' => Hash::make('airdrops123'),
            'department' => 'Pharmacy',
            'isAdmin' => 1,
            'isActive' => 1,
            'rank' => 'Pharmacist',
            'email_verified_at' => now()
        ]);

        $user->assignRole($adminRole);
    }
}
