<?php

namespace App\Filament\App\Resources\TeamResource\Pages;

use App\Filament\App\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    public function getTitle(): string|Htmlable
    {
        return $this->getRecord()->name;
    }

    // remove bread crumbs
    public function getBreadcrumbs(): array
    {
        return [
        ];
    }

}
