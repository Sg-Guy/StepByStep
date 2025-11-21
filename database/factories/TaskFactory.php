<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User; // N'oubliez pas d'importer le modèle User
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        // Définir les options possibles pour Status et Priority
        $statuses = ['en pause', 'en cours', 'terminee'];
        $priorities = ['basse', 'normale', 'haute', 'urgent'];
        $categories = ['Études', 'Projet Personnel', 'Administration', 'Sport', 'Autre'];

        return [
            'taskTitle' => $this->faker->realText(10),
            'taskDescription' => $this->faker->realText(40),
            // Date d'échéance aléatoire dans les 30 prochains jours
            'taskDueDate' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), 
            'taskCategory' => $this->faker->randomElement($categories),
            'taskPriority' => $this->faker->randomElement($priorities),
            // Date de rappel aléatoire dans les 7 prochains jours
            'taskReminder' => $this->faker->dateTimeBetween('now', '+7 days')->format('Y-m-d'), 
            'taskStatus' => $this->faker->randomElement($statuses),
            // Associe la tâche à un utilisateur existant aléatoirement
            'user_id' => User::factory(), // Ceci créera un nouvel utilisateur pour chaque tâche si les users n'existent pas
        ];
    }
    
    // Vous pouvez ajouter des états spécifiques, par exemple pour une tâche terminée
    public function completed(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'taskStatus' => 'terminee',
            ];
        });
    }
}
