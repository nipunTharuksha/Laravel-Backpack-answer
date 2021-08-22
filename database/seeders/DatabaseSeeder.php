<?php

namespace Database\Seeders;

use App\Models\Instance;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Instance::factory(2)->forProject([
            'name' => 'Jessica Archer',
        ])->create();

        Instance::factory(3)->forProject([
            'name' => 'Jessica Archer2',
        ])->create();

        User::factory(2)
            ->hasInstances([
                'instance_id' => 4
            ])
            ->hasProjects([
                'project_id' => 1
            ])
            ->create();
    }
}
