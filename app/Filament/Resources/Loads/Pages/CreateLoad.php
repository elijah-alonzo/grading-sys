<?php

namespace App\Filament\Resources\Loads\Pages;

use App\Filament\Resources\Loads\LoadResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLoad extends CreateRecord
{
    protected static string $resource = LoadResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
