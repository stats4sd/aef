<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

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
            // // TODO: support multiple languages
            // Actions\Action::make('Save')->action('save')->label('Save changes'),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        // below section is copied from "main" branch, it needs to be revised
        // 
        // TODO: 
        // 1. show current status to user and reviewer
        // 2. show the related action to be take for different status, e.g.
        //  - Proposal: 
        //    - allow user to request reviewer approval
        //    - allow reviewer to approve, change status from Proposal to Development
        //  - Development
        //    - allow user to request review from reviewer, change status from Development to Ready for review
        //  - Ready for review
        //    - allow reviewer to approve, change status from Ready for review to Reviewed
        //  - Revised
        //    - no action can be taken at this stage

        return $form->schema([
            Section::make(t('Case Submitter Confirmation'))
                ->icon('heroicon-o-check-circle')
                ->schema([
                    // This checkbox is for submitter only, not for reviewer
                    // It should be disabled for user with admin role
                    Checkbox::make('ready_for_review')
                        ->label(t('I confirm that all content is correct. This case is now ready for reviewer to review.'))
                        ->hint(t('This is to be confirmed by case submitter'))
                        ->disabled(auth()->user()->isAdmin())
                        ->columnSpanFull(),
                ]),

            Section::make(t('Case Reviewer Confirmation'))
                ->icon('heroicon-o-shield-check')
                ->schema([
                    // This checkbox is for reviewer only, not for submitter
                    // It should be disabled for user without admin role
                    Checkbox::make('reviewed')
                        ->label(t('I confirm that all content has been reviewed. This case is now ready for publishing.'))
                        ->hint(t('This is to be confirmed by case reviewer'))
                        ->disabled(!auth()->user()->isAdmin())
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
