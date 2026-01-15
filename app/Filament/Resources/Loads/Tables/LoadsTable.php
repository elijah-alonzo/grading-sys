<?php

namespace App\Filament\Resources\Loads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
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
                    ->sortable(),
                
                TextColumn::make('section.code')
                    ->label('Section Code')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('section.name')
                    ->label('Section Name')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('academic_year')
                    ->label('Academic Year')
                    ->sortable(),
                
                TextColumn::make('semester')
                    ->label('Semester')
                    ->sortable(),
                
                TextColumn::make('schedule')
                    ->label('Schedule')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'grades_submitted',
                        'primary' => 'completed',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-check-circle' => 'grades_submitted',
                        'heroicon-o-check-badge' => 'completed',
                    ]),
                
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                        'pending' => 'Pending',
                        'grades_submitted' => 'Grades Submitted',
                        'completed' => 'Completed',
                    ]),
                
                SelectFilter::make('academic_year')
                    ->options(function () {
                        return \App\Models\Load::distinct('academic_year')
                            ->pluck('academic_year', 'academic_year')
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
