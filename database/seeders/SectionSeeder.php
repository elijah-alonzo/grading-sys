<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'code' => 'BSN1',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '1st Year',
                'department_id' => 1, // Assuming first department
            ],
            [
                'code' => 'BSN2',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '2nd Year',
                'department_id' => 1,
            ],
            [
                'code' => 'BSN3',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '3rd Year',
                'department_id' => 1,
            ],
            [
                'code' => 'BSN4',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '4th Year',
                'department_id' => 1,
            ],
            [
                'code' => 'BSCS1',
                'name' => 'Bachelor of Science in Information Technology',
                'year_level' => '1st Year',
                'department_id' => 2, // Assuming second department
            ],
            [
                'code' => 'BSCS2',
                'name' => 'Bachelor of Science in Information Technology',
                'year_level' => '2nd Year',
                'department_id' => 2,
            ],
            [
                'code' => 'BSCS3',
                'name' => 'Bachelor of Science in Information Technology',
                'year_level' => '3rd Year',
                'department_id' => 2,
            ],
            [
                'code' => 'BSCS4',
                'name' => 'Bachelor of Science in Information Technology',
                'year_level' => '4th Year',
                'department_id' => 2,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }

        $this->command->info('Section seeder completed successfully.');
    }
}
