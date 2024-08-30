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
        return __(t('Please fill in all basic information first. After creating a new case, you can fill in details in all other tabs.'));
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = auth()->user()->latestTeam->id;

        return $data;
    }

    // redirect to Edit view tab 2 after record creation
    protected function getRedirectUrl(): string
    {
        $appUrl = config('app.url');
        $latestTeamId = auth()->user()->latestTeam->id;
        $recordId = $this->record->id;

        $redirectUrl = $appUrl . '/app/' . $latestTeamId . '/study-cases/' . $recordId . '/edit?tab=-tab-2-tab';

        return $redirectUrl;
    }
}
