<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Load;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class LoadSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing data
        $faculties = Faculty::all();
        $subjects = Subject::all();
        $sections = Section::all();

        if ($faculties->count() > 0 && $subjects->count() > 0 && $sections->count() > 0) {
            // Sample loads for current academic year
            $loads = [
                [
                    'faculty_id' => $faculties->first()->id,
                    'subject_id' => $subjects->first()->id,
                    'section_id' => $sections->first()->id,
                    'academic_year' => '2025-2026',
                    'semester' => '1st Semester',
                    'schedule' => 'MWF 8:00-9:00 AM, Room 101',
                    'status' => 'pending',
                ],
                [
                    'faculty_id' => $faculties->first()->id,
                    'subject_id' => $subjects->skip(1)->first()?->id ?? $subjects->first()->id,
                    'section_id' => $sections->skip(1)->first()?->id ?? $sections->first()->id,
                    'academic_year' => '2025-2026',
                    'semester' => '1st Semester',
                    'schedule' => 'TTH 10:00-11:30 AM, Room 102',
                    'status' => 'grades_submitted',
                ],
            ];

            foreach ($loads as $load) {
                Load::create($load);
            }
        }
    }
}