<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\App\Resources\StudyCaseResource;

class ListStudyCases extends ListRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected static string $view = 'filament.app.resources.study-case-resource.pages.list-study-cases';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
