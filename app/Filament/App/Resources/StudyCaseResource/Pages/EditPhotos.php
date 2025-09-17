<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use App\Enums\StudyCaseStatus;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\App\Resources\StudyCaseResource;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class EditPhotos extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public static function getNavigationLabel(): string
    {
        return t('Photos');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-photo';
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

    protected function getRedirectUrl(): string
    {
        // for case submitter and study case status is Proposal, redirect to list page
        if ($this->record->status == StudyCaseStatus::Proposal && !auth()->user()->isAdmin()) {
            return $this->getResource()::getUrl('index', ['record' => $this->record->id]);
        } 
        // otherwise, redirect to EditConfirmation page
        else 
        {
            return $this->getResource()::getUrl('edit-confirmation', ['record' => $this->record->id]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Photos')
                    ->schema([

                        SpatieMediaLibraryFileUpload::make('cover_photo')
                            ->label(t('Cover photo'))
                            ->hint(t('Please upload 1 cover photo for the case entry.'))
                            ->collection('cover_photo')
                            ->downloadable()
                            ->preserveFilenames()
                            ->maxFiles(1)
                            ->maxSize(512000)
                            ->columnSpanFull()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['16:9'])
                            ->disk('s3'),

                        SpatieMediaLibraryFileUpload::make('logo_image')
                            ->label(t('Organisation or project logo image'))
                            ->hint(t('Please upload 1 organisation or project logo image for the case entry.'))
                            ->collection('logo_image')
                            ->downloadable()
                            ->preserveFilenames()
                            ->maxFiles(1)
                            ->maxSize(512000)
                            ->columnSpanFull()
                            ->image()
                            ->disk('s3'),

                        Repeater::make('photos')
                            ->label(t('Catalogue photo(s)'))
                            ->hint(t('Please upload here up to 5 photos for the case entry into the catalogue. These photos will help us make your entry in the catalogue look great!'))
                            ->relationship()
                            ->schema([

                                TextInput::make('description')
                                    ->label(t('Description'))
                                    ->required()
                                    ->maxLength(65535),

                                SpatieMediaLibraryFileUpload::make('file')
                                    ->label(t('File'))
                                    ->collection('catalogue_photos')
                                    ->preserveFilenames()
                                    ->downloadable()
                                    ->required()
                                    ->maxSize(512000)
                                    ->image()
                                    ->disk('s3'),

                            ])
                            ->defaultItems(0)
                            ->maxItems(5)
                            ->addActionLabel(t('Add photo')),
                    ]),
            ]);
    }
}
