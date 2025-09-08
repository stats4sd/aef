<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Enums\StudyCaseStatus;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Actions\Action as ComponentAction;
use Filament\Forms\Get;
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

    protected function getHeaderActions(): array
    {
        return [
            // TODO: check if user has ticked checkbox
            // TODO: it is more preferred to move this button inside the corresponding section, instead of adding it as a header button

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

            // Development for submitter
            Section::make(t('Case Submitter Confirmation'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Request to change status from Development to Reviewed'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Development && !auth()->user()->isAdmin())
                ->schema([
                    Checkbox::make('request_for_review')
                        ->label(t('I confirm that all content is correct. This case is now ready for review.'))
                        ->hint(t('This is to be confirmed by case submitter'))
                        ->columnSpanFull(),
                ]),

            // Development for reviewer
            Section::make(t('Status is Development'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Case submitter is further developing by filling in more details.'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Development && auth()->user()->isAdmin()),


            // Ready for review for case submitter
            Section::make(t('Status is Ready for review'))
                ->icon('heroicon-o-check-circle')
                ->description(t('It is now pending on reviewer to approve to change status to Reviewed'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForReview && !auth()->user()->isAdmin()),

            // Ready for review for reviewer
            Section::make(t('Case Reviewer Confirmation'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Request to change status from Development to Reviewed'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForReview && auth()->user()->isAdmin())
                ->schema([
                    Checkbox::make('approve_for_development')
                        ->label(t('I confirm that all content has been reviewed. This case is now ready for publishing.'))
                        ->hint(t('This is to be confirmed by case reviewer'))
                        ->columnSpanFull(),
                ]),


            // Reviewed for both case submitter and reviewer
            Section::make(t('Reviewed and published'))
                ->icon('heroicon-o-check-circle')
                ->description(t('The case has been reviewed and published'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Reviewed),

            ]);

    }
}
