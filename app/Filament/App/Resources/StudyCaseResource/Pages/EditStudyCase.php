<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudyCase extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}