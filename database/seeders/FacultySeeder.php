<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::all();

        if ($departments->isEmpty()) {
            $this->command->warn('No departments found. Please run DepartmentSeeder first.');
            return;
        }

        $faculties = [
            [
                'name' => 'Serafin Gazzingan',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'serafin.gazzingan@spup.edu',
                'phone' => '+63 917 123 4567',
            ],
            [
                'name' => 'Rheychelle Antonio',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'rheychelle.antonio@spup.edu',
                'phone' => '+63 917 234 5678',
            ],
            [
                'name' => 'Sheena Gumarang',
                'employment_type' => 'Part-Time',
                'department_id' => $departments->random()->id,
                'email' => 'sheena.gumarang@spup.edu',
                'phone' => '+63 917 345 6789',
            ],
            [
                'name' => 'Dr. Marifel Kummer',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'marifel.kummer@spup.edu',
                'phone' => '+63 917 456 7890',
            ],
            [
                'name' => 'Justin Tan',
                'employment_type' => 'Part-Time',
                'department_id' => $departments->random()->id,
                'email' => 'justin.tan@spup.edu',
                'phone' => '+63 917 567 8901',
            ],
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }

        $this->command->info('Faculty seeder completed successfully.');
    }
}
