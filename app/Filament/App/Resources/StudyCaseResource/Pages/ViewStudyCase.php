<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStudyCase extends ViewRecord
{
    protected static string $resource = StudyCaseResource::class;

    // to show relation manager in tabs
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    // TODO: when user click "View" button in list page, it should show study case Basic Information page in read-only mode
    
}
