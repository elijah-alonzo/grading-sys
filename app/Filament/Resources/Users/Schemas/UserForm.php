<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Information')
                    ->description('Create or edit user account details')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->prefixIcon('heroicon-o-user')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter full name'),

                        Select::make('role')
                            ->prefixIcon('heroicon-o-shield-check')
                            ->required()
                            ->options([
                                'head' => 'Registrar Head',
                                'officer' => 'Registrar Officer',
                            ])
                            ->placeholder('Select role'),

                        TextInput::make('email')
                            ->prefixIcon('heroicon-o-envelope')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->placeholder('Enter email address'),

                        TextInput::make('phone')
                            ->prefixIcon('heroicon-o-phone')
                            ->tel()
                            ->maxLength(255)
                            ->placeholder('Enter phone number'),

                        TextInput::make('password')
                            ->prefixIcon('heroicon-o-lock-closed')
                            ->password()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->hiddenOn('view')
                            ->revealable(),
                    ])
                    ->columns(2),
            ]);
    }
}
