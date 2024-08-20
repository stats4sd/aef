<?php

namespace App\Filament\App\Resources\OrganisationResource\Pages;

use App\Filament\App\Resources\OrganisationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganisation extends CreateRecord
{
    protected static string $resource = OrganisationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
