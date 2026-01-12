<?php

namespace App\Filament\Resources\Faculties\Schemas;

use App\Models\Department;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FacultyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Faculty Information')
                    ->description('Manage faculty members and their details')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->prefixIcon('heroicon-o-user')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name'),

                        Select::make('employment_type')
                            ->prefixIcon('heroicon-o-briefcase')
                            ->required()
                            ->options([
                                'Full-Time' => 'Full-Time',
                                'Part-Time' => 'Part-Time',
                            ])
                            ->placeholder('Select employment type'),

                        Select::make('department_id')
                            ->prefixIcon('heroicon-o-building-office')
                            ->required()
                            ->relationship('department', 'name')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select department'),

                        TextInput::make('email')
                            ->prefixIcon('heroicon-o-envelope')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('Enter email address'),

                        TextInput::make('phone')
                            ->prefixIcon('heroicon-o-phone')
                            ->tel()
                            ->maxLength(255)
                            ->placeholder('Enter phone number'),
                    ])
                    ->columns(2),
            ]);
    }
}
