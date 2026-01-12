<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subject Information')
                    ->description('Manage curriculum subjects and course catalog')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->prefixIcon('heroicon-o-book-open')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter subject name'),

                        TextInput::make('units')
                            ->prefixIcon('heroicon-o-calculator')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->maxValue(6)
                            ->placeholder('Enter credit units'),

                        Select::make('type')
                            ->prefixIcon('heroicon-o-tag')
                            ->required()
                            ->options([
                                'Major' => 'Major',
                                'Minor' => 'Minor',
                            ])
                            ->placeholder('Select subject type'),

                        Textarea::make('description')
                            ->rows(3)
                            ->placeholder('Enter subject description'),
                    ])
                    ->columns(2),
            ]);
    }
}
