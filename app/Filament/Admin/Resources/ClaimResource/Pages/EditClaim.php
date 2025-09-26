<?php

namespace App\Filament\Admin\Resources\ClaimResource\Pages;

use App\Filament\Admin\Resources\ClaimResource;
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

    public function getBreadcrumbs(): array
    {
        $breadcrumbs = [];
        $studyCase = $this->record->studyCase;

        $casesUrl = route('filament.admin.resources.study-cases.index');
        $breadcrumbs[$casesUrl] = 'Cases';

        $studyCaseEditUrl = route('filament.admin.resources.study-cases.manage-case-study-claims', ['record' => $studyCase->id]);
        $breadcrumbs[$studyCaseEditUrl] = $studyCase->title;
    
        $claimsUrl = $studyCaseEditUrl;
        $breadcrumbs[$claimsUrl] = 'Claims';

        $breadcrumbs[] = 'Edit';

        return $breadcrumbs;
    }

    // redirect to Study case edit view, tab "Claims and Evidence" after record update
    protected function getRedirectUrl(): string
    {
        $appUrl = config('app.url');

        // ownerRecord is study case Id
        // extract ownerRecord value from previous URL, e.g.
        // http://aef.test/admin/claims/29/edit?ownerRecord=45&tenant=1

        $previousUrl = url()->previous();
        $queryString = parse_url($previousUrl, PHP_URL_QUERY);
        parse_str($queryString, $params);

        $ownerRecordId = $params['ownerRecord'];

        $redirectUrl = $appUrl . '/admin/study-cases/' . $ownerRecordId . '/manage-case-study-claims';

        return $redirectUrl;
    }
}
