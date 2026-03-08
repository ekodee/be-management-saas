<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)->create();
        $projects = Project::factory(10)->create();

        foreach ($projects as $project) {
            $randomMembers = $user->random(3);

            $project->members()->attach($randomMembers);

            Task::factory(3)->create([
                'project_id' => $project->id,
                'assigned_to' => $randomMembers->random()->id,
            ]);
        }
    }
}
