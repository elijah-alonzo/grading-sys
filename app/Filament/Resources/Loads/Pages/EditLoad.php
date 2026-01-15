<?php

namespace App\Filament\Resources\Loads\Pages;

use App\Filament\Resources\Loads\LoadResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLoad extends EditRecord
{
    protected static string $resource = LoadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
