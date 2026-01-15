<?php

namespace App\Filament\Resources\Loads\Pages;

use App\Filament\Resources\Loads\LoadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLoads extends ListRecords
{
    protected static string $resource = LoadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
