<?php

namespace App\Filament\App\Resources\ClaimResource\Pages;

use App\Filament\App\Resources\ClaimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClaim extends EditRecord
{
    protected static string $resource = ClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // redirect to Study case edit view, tab "Claims and Evidence" after record update
    protected function getRedirectUrl(): string
    {
        $appUrl = config('app.url');
        $latestTeamId = auth()->user()->latestTeam->id;

        // ownerRecord is study case Id
        // extract ownerRecord value from previous URL, e.g.
        // http://aef.test/app/1/claims/29/edit?ownerRecord=45

        $previousUrl = url()->previous();
        $queryString = parse_url($previousUrl, PHP_URL_QUERY);
        parse_str($queryString, $params);

        $ownerRecordId = $params['ownerRecord'];

        $redirectUrl = $appUrl . '/app/' . $latestTeamId . '/study-cases/' . $ownerRecordId . '/edit?tab=-tab-1-tab&activeRelationManager=0';

        return $redirectUrl;
    }

    // to show relation manager in tabs
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return false;
    }
}
