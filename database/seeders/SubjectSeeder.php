<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Introduction to Computer Science',
                'units' => 3,
                'type' => 'Major',
                'description' => 'Fundamental concepts of computer science and programming.',
            ],
            [
                'name' => 'College Algebra',
                'units' => 3,
                'type' => 'Major',
                'description' => 'Basic algebraic concepts and problem-solving techniques.',
            ],
            [
                'name' => 'English Composition',
                'units' => 3,
                'type' => 'Major',
                'description' => 'Writing skills and composition techniques.',
            ],
            [
                'name' => 'Game Development',
                'units' => 4,
                'type' => 'Major',
                'description' => 'Introduction to game development concepts and techniques.',
            ],
            [
                'name' => 'General Chemistry I',
                'units' => 4,
                'type' => 'Major',
                'description' => 'Basic principles of chemistry and chemical reactions.',
            ],
            [
                'name' => 'World History',
                'units' => 3,
                'type' => 'Minor',
                'description' => 'Survey of world history from ancient to modern times.',
            ],
            [
                'name' => 'General Biology',
                'units' => 4,
                'type' => 'Major',
                'description' => 'Introduction to biological concepts and processes.',
            ],
            [
                'name' => 'Physical Education',
                'units' => 2,
                'type' => 'Minor',
                'description' => 'Physical fitness and health education.',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        $this->command->info('Subject seeder completed successfully.');
    }
}
