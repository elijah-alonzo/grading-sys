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
                            ->label('Name')
                            ->prefixIcon('heroicon-o-user')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name')
                            ->columnSpan(1),

                        Select::make('employment_type')
                            ->label('Employment Type')
                            ->prefixIcon('heroicon-o-briefcase')
                            ->required()
                            ->options([
                                'Full-Time' => 'Full-Time',
                                'Part-Time' => 'Part-Time',
                            ])
                            ->placeholder('Select employment type')
                            ->columnSpan(1),

                        Select::make('department_id')
                            ->label('Department')
                            ->prefixIcon('heroicon-o-building-office')
                            ->required()
                            ->relationship('department', 'name')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select department')
                            ->columnSpan(1),

                        TextInput::make('email')
                            ->label('Email address')
                            ->prefixIcon('heroicon-o-envelope')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('Enter email address')
                            ->columnSpan(1),

                        TextInput::make('phone')
                            ->label('Phone number')
                            ->prefixIcon('heroicon-o-phone')
                            ->tel()
                            ->maxLength(255)
                            ->placeholder('Enter phone number')
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->extraAttributes(['class' => 'mb-6']),

                Section::make('Security & Privacy')
                    ->description('Set up password for the faculty account')
                    ->columnSpanFull()
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('password')
                                    ->label('Password')
                                    ->prefixIcon('heroicon-o-lock-closed')
                                    ->password()
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->minLength(8)
                                    ->dehydrateStateUsing(fn ($state) => \Illuminate\Support\Facades\Hash::make($state))
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->hiddenOn('view')
                                    ->revealable()
                                    ->placeholder('Minimum 8 characters'),

                                TextInput::make('password_confirmation')
                                    ->label('Confirm Password')
                                    ->prefixIcon('heroicon-o-shield-check')
                                    ->password()
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->placeholder('Repeat password')
                                    ->revealable(),
                            ]),
                    ]),
            ]);
    }
}
