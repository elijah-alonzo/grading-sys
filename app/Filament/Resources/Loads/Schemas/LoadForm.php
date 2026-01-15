<?php

namespace App\Filament\Resources\Loads\Schemas;

use App\Models\Faculty;
use App\Models\Section;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as FormSection;
use Filament\Schemas\Schema;

class LoadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FormSection::make('Teaching Load Assignment')
                    ->description('Assign faculty members to teach subjects for specific sections')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('faculty_id')
                            ->label('Faculty')
                            ->prefixIcon('heroicon-o-user')
                            ->options(Faculty::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->placeholder('Select faculty member'),
                        
                        Select::make('subject_id')
                            ->label('Subject')
                            ->prefixIcon('heroicon-o-book-open')
                            ->options(Subject::all()->mapWithKeys(function ($subject) {
                                return [$subject->id => $subject->name . ' (' . $subject->units . ' units)'];
                            }))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->placeholder('Select subject'),
                        
                        Select::make('section_id')
                            ->label('Section')
                            ->prefixIcon('heroicon-o-academic-cap')
                            ->options(Section::all()->mapWithKeys(function ($section) {
                                return [$section->id => $section->code . ' - ' . $section->name];
                            }))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->placeholder('Select section'),
                    ])
                    ->columns(3),
                
                FormSection::make('Schedule & Academic Details')
                    ->description('Set the academic period and class schedule information')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('year')
                            ->label('Year')
                            ->prefixIcon('heroicon-o-calendar-days')
                            ->placeholder('e.g., 2025-2026')
                            ->required()
                            ->maxLength(20),
                        
                        Select::make('semester')
                            ->label('Semester')
                            ->prefixIcon('heroicon-o-calendar')
                            ->options([
                                '1st Semester' => '1st Semester',
                                '2nd Semester' => '2nd Semester',
                                'Summer' => 'Summer',
                            ])
                            ->required()
                            ->placeholder('Select semester'),
                        
                        Textarea::make('schedule')
                            ->label('Schedule')
                            ->placeholder('e.g., MWF 8:00-9:00 AM, Room 101\nTTH 2:00-3:30 PM, Lab 201')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
