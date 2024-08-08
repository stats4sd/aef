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
        return [];
    }
}
