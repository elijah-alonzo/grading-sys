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
            ['code' => 'SITE', 'name' => 'School of Information Technology and Engineering'],
            ['code' => 'SBAHM', 'name' => 'School of Business, Accountancy, and Hospitality Management'],
            ['code' => 'SNAHS', 'name' => 'School of Nursing and Allied Health Sciences'],
            ['code' => 'SASTE', 'name' => 'School of Arts Sciences and Teacher Education'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
