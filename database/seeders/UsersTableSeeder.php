<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Carlos',
            'email' => 'carlosoliva5503@gmail.com',
            'password' => '$2y$12$5Ux8X7KNrV./BhagJiUzpOzBsqDIoPw..ctbJ3BhnvRDdepbZUQmK',
            'ultimaConexion' => now(),
            'tipoUsuario' => 1,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Usuario2',
            'email' => 'user2@gmail.com',
            'password' => '$2y$12$i4VMh.nD38hxKtwtXIkk..uTLAsee5XLbGueK4z8b03f6ngySYhbG',
            'ultimaConexion' => now(),
            'tipoUsuario' => 0,
            'email_verified_at' => now(),
        ]);
    }
}
