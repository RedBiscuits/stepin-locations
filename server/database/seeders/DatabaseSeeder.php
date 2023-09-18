<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role2 = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'superAdmin']);

        $user = User::create([
            'name' => 'Test User',
            'email' => 'testt@example.com',
            'password' =>'123456789'
        ]);
        $user->assignRole($role);

        //User::factory(5)->create();

    }
}