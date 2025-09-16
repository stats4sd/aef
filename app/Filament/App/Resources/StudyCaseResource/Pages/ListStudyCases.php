<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
use App\Filament\App\Resources\StudyCaseResource;

class ListStudyCases extends ListRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected static string $view = 'filament.app.resources.study-case-resource.pages.list-study-cases';

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('New Case')
                ->action(function() {

                    // automatically create a new case study with status proposal and redirect to edit page
                    // fill in default values
                    // it is also a compromise to an issue that if user clicks Cancel button after creating case, 
                    // an empty study case will be created
                    $studyCase = \App\Models\StudyCase::create([
                        'status' => \App\Enums\StudyCaseStatus::Proposal,
                        'team_id' => Filament::getTenant()?->id ?? auth()->user()->currentTeam->id,
                        'title' => 'Untitled',
                        'year_of_development' => Carbon::now()->format('Y'),
                    ]);

                    $this->redirect(StudyCaseResource::getUrl('edit-basic-information', ['record' => $studyCase->id]));


                }),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
