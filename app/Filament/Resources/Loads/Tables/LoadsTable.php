<?php

namespace App\Filament\Resources\Loads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LoadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('faculty.name')
                    ->label('Faculty')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('subject.name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('subject.units')
                    ->label('Units')
                    ->sortable()
                    ->alignCenter(),
                
                TextColumn::make('section.code')
                    ->label('Section')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('schedule')
                    ->label('Schedule')
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
                            return null;
                        }
                        return $state;
                    }),
                
                TextColumn::make('year')
                    ->label('Year')
                    ->sortable(),
                
                TextColumn::make('semester')
                    ->label('Semester')
                    ->sortable(),
                
                ToggleColumn::make('status')
                    ->label('Status')
                    ->onIcon('heroicon-o-check-circle')
                    ->offIcon('heroicon-o-x-circle')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('semester')
                    ->options([
                        '1st Semester' => '1st Semester',
                        '2nd Semester' => '2nd Semester',
                        'Summer' => 'Summer',
                    ]),
                
                SelectFilter::make('status')
                    ->options([
                        '1' => 'Submitted',
                        '0' => 'Not Submitted',
                    ]),
                
                SelectFilter::make('year')
                    ->options(function () {
                        return \App\Models\Load::distinct('year')
                            ->pluck('year', 'year')
                            ->toArray();
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
