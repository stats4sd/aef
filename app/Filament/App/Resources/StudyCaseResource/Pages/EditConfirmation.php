<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Enums\StudyCaseStatus;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\RichEditor;
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

    protected function getHeaderActions(): array
    {
        return [
            // TODO: support multiple languages
            Actions\Action::make('Save')->action('save')->label('Save changes'),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        // show the corresponding section per status per role

        return $form->schema([

            // Proposal for case submitter
            Section::make(t('Case Submitter Confirmation'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Request to change status from Proposal to Development'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Proposal && !auth()->user()->isAdmin())
                ->schema([
                    Checkbox::make('request_for_development')
                        ->label(t('I confirm that all content is correct. This case is now ready for development.'))
                        ->hint(t('This is to be confirmed by case submitter'))
                        ->columnSpanFull(),
                ]),

            // Proposal for reviewer
            Section::make(t('Status is Proposal'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Case submitter is filling study case details.'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::Proposal && auth()->user()->isAdmin()),


            // Ready for development for case submitter
            Section::make(t('Status is Ready for development'))
                ->icon('heroicon-o-check-circle')
                ->description(t('It is now pending on reviewer to approve to change status to Development'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForDevelopment && !auth()->user()->isAdmin()),

            // Ready for development for reviewer
            Section::make(t('Case Reviewer Confirmation'))
                ->icon('heroicon-o-check-circle')
                ->description(t('Request to change status from Proposal to Development'))
                ->visible(fn($record) => $record->status == StudyCaseStatus::ReadyForDevelopment && auth()->user()->isAdmin())
                ->schema([
                    Checkbox::make('approve_for_development')
                        ->label(t('I confirm that all content is correct. This case is now ready for development.'))
                        ->hint(t('This is to be confirmed by case reviewer'))
                        ->columnSpanFull(),
                ]),


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
