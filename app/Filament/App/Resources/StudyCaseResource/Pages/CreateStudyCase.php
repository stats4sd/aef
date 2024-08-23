<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudyCase extends CreateRecord
{
    protected static string $resource = StudyCaseResource::class;

    public function getSubheading(): ?string
    {
        return __(t('Please kindly fill in all basic information first. After creating a new case, you can fill in details in all other tabs.'));
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = auth()->user()->latestTeam->id;

        return $data;
    }

    // TODO: redirect to Edit view after creating new record
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
