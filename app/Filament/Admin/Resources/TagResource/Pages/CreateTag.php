<?php

namespace App\Filament\Admin\Resources\TagResource\Pages;

use App\Filament\Admin\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
