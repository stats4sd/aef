<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudyCase extends CreateRecord
{
    protected static string $resource = StudyCaseResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = auth()->user()->latestTeam->id;

        return $data;
    }
}
