<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Forms\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewBasicInformation extends ViewRecord
{
    protected static string $resource = StudyCaseResource::class;


    public function form(Form $form): Form
    {
        return (new EditBasicInformation())->form($form);
    }

}
