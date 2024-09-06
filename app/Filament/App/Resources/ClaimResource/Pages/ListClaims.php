<?php

namespace App\Filament\App\Resources\ClaimResource\Pages;

use App\Filament\App\Resources\ClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClaims extends ListRecords
{
    protected static string $resource = ClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
