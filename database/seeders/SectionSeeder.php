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
            ],
            [
                'code' => 'BSN2',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '2nd Year',
            ],
            [
                'code' => 'BSN3',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '3rd Year',
            ],
            [
                'code' => 'BSN4',
                'name' => 'Bachelor of Science in Nursing',
                'year_level' => '4th Year',
            ],
            [
                'code' => 'BSCS1',
                'name' => 'Bachelor of Science in Computer Science',
                'year_level' => '1st Year',
            ],
            [
                'code' => 'BSCS2',
                'name' => 'Bachelor of Science in Computer Science',
                'year_level' => '2nd Year',
            ],
            [
                'code' => 'BSCS3',
                'name' => 'Bachelor of Science in Computer Science',
                'year_level' => '3rd Year',
            ],
            [
                'code' => 'BSCS4',
                'name' => 'Bachelor of Science in Computer Science',
                'year_level' => '4th Year',
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }

        $this->command->info('Section seeder completed successfully.');
    }
}
