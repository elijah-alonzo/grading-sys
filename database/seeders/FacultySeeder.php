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
                'name' => 'Dr. Maria Santos',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'maria.santos@university.edu',
                'phone' => '+63 917 123 4567',
            ],
            [
                'name' => 'Prof. Juan dela Cruz',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'juan.delacruz@university.edu',
                'phone' => '+63 917 234 5678',
            ],
            [
                'name' => 'Ms. Anna Garcia',
                'employment_type' => 'Part-Time',
                'department_id' => $departments->random()->id,
                'email' => 'anna.garcia@university.edu',
                'phone' => '+63 917 345 6789',
            ],
            [
                'name' => 'Dr. Robert Johnson',
                'employment_type' => 'Full-Time',
                'department_id' => $departments->random()->id,
                'email' => 'robert.johnson@university.edu',
                'phone' => '+63 917 456 7890',
            ],
            [
                'name' => 'Prof. Lisa Chen',
                'employment_type' => 'Part-Time',
                'department_id' => $departments->random()->id,
                'email' => 'lisa.chen@university.edu',
                'phone' => '+63 917 567 8901',
            ],
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }

        $this->command->info('Faculty seeder completed successfully.');
    }
}
