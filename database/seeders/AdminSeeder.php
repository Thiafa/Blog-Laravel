<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'thiago',
            'email' => 'thiafa.vos@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('manager');
    }
}
