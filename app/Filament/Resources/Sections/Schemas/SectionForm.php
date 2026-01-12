<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Section Information')
                    ->description('Manage available sections in the school')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('code')
                            ->prefixIcon('heroicon-o-hashtag')
                            ->required()
                            ->maxLength(10)
                            ->placeholder('Enter section code (e.g., BSN1, BSCS2)'),

                        TextInput::make('name')
                            ->prefixIcon('heroicon-o-academic-cap')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter section name (e.g., Bachelor of Science in Nursing)'),

                        TextInput::make('year_level')
                            ->prefixIcon('heroicon-o-calendar')
                            ->required()
                            ->maxLength(20)
                            ->placeholder('Enter year level (e.g., 1st Year, 2nd Year)'),
                    ])
                    ->columns(2),
            ]);
    }
}
