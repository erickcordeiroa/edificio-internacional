<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar usuário admin
        User::firstOrCreate(
            ['email' => 'sindico@edificiointernacional.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('sindico2023*'),
                'status' => 'active',
                'role' => 'admin',
            ]
        );

        // Criar imóveis de exemplo
        $this->call(PropertySeeder::class);
        
        // Criar frações de exemplo
        $this->call(FractionSeeder::class);
        $this->call(ApartmentFractionSeeder::class);
    }
}
