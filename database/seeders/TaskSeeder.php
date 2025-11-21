<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous d'abord qu'il y a des utilisateurs dans la base de données
        if (User::count() === 0) {
            $this->call(UserSeeder::class);
        }

        // Récupérer tous les IDs des utilisateurs existants
        $userIds = User::pluck('id');

        // Créer 200 tâches
        for ($i = 0; $i < 200; $i++) {
            Task::factory()->create([
                // Assigner la tâche à un user_id aléatoire parmi ceux existants
                'user_id' => $userIds->random(), 
            ]);
        }
        
        // Créer 5 tâches terminées pour l'admin spécifique (ID 1 si vous l'avez créé)
        Task::factory()
            ->count(5)
            ->completed() // Utilise l'état 'completed' défini dans la factory
            ->create([
                'user_id' => 1, // Assurez-vous que l'utilisateur avec l'ID 1 existe (ex: l'admin)
            ]);
    }
}

