<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Department Information')
                    ->description('Manage academic departments')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('code')
                            ->prefixIcon('heroicon-o-hashtag')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter department code (e.g., CIT)')
                            ->columnSpan(1),

                        TextInput::make('name')
                            ->prefixIcon('heroicon-o-building-office')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter department name')
                            ->columnSpan(2),
                    ])
                    ->columns(3),
            ]);
    }
}
