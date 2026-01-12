<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'School of Information Technology and Engineering',
            'School of Business, Accountancy, and Hospitality Management',
            'School of Nursing and Allied Health Sciences',
            'School of Arts Sciences and Teacher Education',
        ];

        foreach ($departments as $department) {
            Department::create([
                'name' => $department,
            ]);
        }
    }
}
