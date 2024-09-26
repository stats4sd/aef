<?php

namespace App\Filament\App\Resources\ClaimResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\App\Resources\ClaimResource;

class EditClaim extends EditRecord
{
    protected static string $resource = ClaimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Remove bread crumb "Claims > Edit" to avoid user clicks "Claims" link to list all claims records of all cases.
    //
    // By setting an empty string as title, below items will not be showed:
    // 1. Bread crumb "Claims > Edit"
    // 2. Page title "Edit Claim"
    // 3. "Delete" button in page header
    //
    // P.S. The only way to delete a claim record: Cases resource > Claims relation manager table

    public function getTitle(): string | Htmlable
    {
        return '';
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
}
