<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Enums\StudyCaseStatus;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\App\Resources\StudyCaseResource;


class EditConfirmation extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public static function getNavigationLabel(): string
    {
        return t('Confirmation');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-bars-3-center-left';
    }

    public function getSubheading(): ?string
    {
        return __(t('Please fill in details in all tabs, then create claims and evidence of your case'));
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        // hide "Save changes" button at the bottom
        return parent::getSaveFormAction()
            ->hidden(function (): bool {
                return true;
            });
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        // hide "Cancel" button at the bottom
        return parent::getCancelFormAction()
            ->hidden(function (): bool {
                return true;
            });
    }

    // getRedirectUrl() is not necessary here, as message can be showed to case submitter or reviewer 
    // immediately after clicking action button. e.g. Further develop proposal, Close proposal, Send Request, Approve
    //
    // getRedirectUrl() will not be triggered by clicking custom action buttons, as it is not save button.
    //
    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('index');
    // }

    protected function getHeaderActions(): array
    {
        return [
            // TODO: check if user has ticked checkbox
            // TODO: it is more preferred to move this button inside the corresponding section, instead of adding it as a header button

            // Proposal for reviewer, further develop proposal
            Actions\Action::make('further_develop_proposal')
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status == StudyCaseStatus::Proposal && auth()->user()->isAdmin())
                ->action(function ($record) {                    
                    $record->status = StudyCaseStatus::Development;
                    $record->save();
                }),

            // Proposal for reviewer, close proposal
            Actions\Action::make('close_proposal')
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status == StudyCaseStatus::Proposal && auth()->user()->isAdmin())
                ->action(function ($record) {                    
                    $record->status = StudyCaseStatus::Closed;
                    $record->save();
                }),

            // Development for case submitter
            Actions\Action::make('send_request_for_review')
                ->label('Send request')
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status == StudyCaseStatus::Development && !auth()->user()->isAdmin())
                // Question: How to check if user has ticked checkbox when user click "Send request" button?
                ->action(function ($record) {                    
                    $record->status = StudyCaseStatus::ReadyForReview;
                    $record->save();
                }),

            // Ready for review for reviewer
            Actions\Action::make('approve_request_for_review')
                ->label('Approve')
                ->requiresConfirmation()
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForReview && auth()->user()->isAdmin())
                // Question: How to check if user has ticked checkbox when user click "Approve" button?
                ->action(function ($record) {                    
                    $record->status = StudyCaseStatus::Reviewed;
                    $record->save();
                }),

            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        // show the corresponding section per status per role

        return $form->schema([

            // Proposal for reviewer
            Section::make(t('Review and determine to further develop or close this study case'))
                ->icon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == StudyCaseStatus::Proposal && auth()->user()->isAdmin()),


            // Closed for both case submitter and reviewer
            Section::make(t('The case has been reviewed and closed'))
                ->icon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == StudyCaseStatus::Closed),


            // Development for case submitter
            Section::make(t('Request to change status from Development to Reviewed'))
                ->icon('heroicon-o-check-circle')
                ->description(t('I confirm that all content is correct. This case is now ready for review.'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Development && !auth()->user()->isAdmin()),

            // Development for reviewer
            Section::make(t('Case submitter is further developing by filling in more details'))
                ->icon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == StudyCaseStatus::Development && auth()->user()->isAdmin()),


            // Ready for review for case submitter
            Section::make(t('It is now pending on reviewer to approve to change status to Reviewed'))
                ->icon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForReview && !auth()->user()->isAdmin()),

            // Ready for review for reviewer
            Section::make(t('Request to change status from Development to Reviewed'))
                ->icon('heroicon-o-check-circle')
                ->description(t('I confirm that all content has been reviewed. This case is now ready for publishing.'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForReview && auth()->user()->isAdmin()),


            // Reviewed for both case submitter and reviewer
            Section::make(t('The case has been reviewed and published'))
                ->icon('heroicon-o-check-circle')
                ->visible(fn($record) => $record->status == StudyCaseStatus::Reviewed),

            ]);

    }
}
