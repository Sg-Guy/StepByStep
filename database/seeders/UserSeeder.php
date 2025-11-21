<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Créer un utilisateur administrateur spécifique (données fixes)
        User::create([
            'firstname' => 'Admin',
            'lastname'=>"Universite" ,
            'email' => 'admin@Tache.com',
            'password' => Hash::make('admin123'), // Mot de passe : password
            'email_verified_at' => now(),
            // Ajoutez d'autres champs spécifiques à l'admin si nécessaire
            // 'role' => 'admin', 
        ]);

        // 2. Créer 50 faux utilisateurs étudiants via la factory
        User::factory()->count(50)->create([
             // Vous pouvez surcharger les valeurs de la factory ici si besoin
             // 'role' => 'etudiant', 
        ]);

    }
}
