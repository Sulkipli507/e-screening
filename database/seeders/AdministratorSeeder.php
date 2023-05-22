<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'sulkipli';
        $admin->email = 'sulkipli@gmail.com';
        $admin->password = \Hash::make('123');
        $admin->role = 'admin';
        $admin->save();
        $this->command->info("User admin berhasil ditambahkan");     
    }
}
