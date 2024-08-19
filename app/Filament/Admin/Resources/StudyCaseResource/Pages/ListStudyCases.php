<?php

namespace App\Filament\Admin\Resources\StudyCaseResource\Pages;

use App\Filament\Admin\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudyCases extends ListRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // hide "Create" button
            // reviewer should not be able to create new study case.
            // study case should be created by leading organisation member.

            // Actions\CreateAction::make(),
        ];
    }
}
