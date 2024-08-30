<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudyCase extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public function getSubheading(): ?string
    {
        return __(t('Please fill in details in all tabs, and create claims of your case'));
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }
}
