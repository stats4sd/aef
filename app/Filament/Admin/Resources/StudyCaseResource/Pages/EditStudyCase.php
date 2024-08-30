<?php

namespace App\Filament\Admin\Resources\StudyCaseResource\Pages;

use App\Filament\Admin\Resources\StudyCaseResource;
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

    // to show relation manager in tabs
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
