<?php

namespace App\Filament\Resources\Loads\Schemas;

use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('faculty_id')
                    ->label('Faculty')
                    ->options(Faculty::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                
                Select::make('subject_id')
                    ->label('Subject')
                    ->options(Subject::all()->mapWithKeys(function ($subject) {
                        return [$subject->id => $subject->name . ' (' . $subject->units . ' units)'];
                    }))
                    ->searchable()
                    ->required(),
                
                Select::make('section_id')
                    ->label('Section')
                    ->options(Section::all()->mapWithKeys(function ($section) {
                        return [$section->id => $section->code . ' - ' . $section->name];
                    }))
                    ->searchable()
                    ->required(),
                
                TextInput::make('academic_year')
                    ->label('Academic Year')
                    ->placeholder('e.g., 2025-2026')
                    ->required(),
                
                Select::make('semester')
                    ->label('Semester')
                    ->options([
                        '1st Semester' => '1st Semester',
                        '2nd Semester' => '2nd Semester',
                        'Summer' => 'Summer',
                    ])
                    ->required(),
                
                Textarea::make('schedule')
                    ->label('Schedule')
                    ->placeholder('e.g., MWF 8:00-9:00 AM, Room 101')
                    ->rows(3),
                
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'grades_submitted' => 'Grades Submitted',
                        'completed' => 'Completed',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
