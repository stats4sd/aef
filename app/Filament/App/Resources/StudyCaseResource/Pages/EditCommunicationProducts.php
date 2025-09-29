<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Htmlable;

use Filament\Resources\Pages\EditRecord;

class EditCommunicationProducts extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public static function getNavigationLabel(): string
    {
        return t('Communication Products');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-video-camera';
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
        return $this->getResource()::getUrl('edit-photos', ['record' => $this->record->id]);
    }

    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Section::make('Communication Products')
                    ->schema([
                        Repeater::make('communicationProducts')
                            ->label(t('Communication product(s)'))
                            ->hint(t('Description, web address and link to upload communication products: documents, videos and/or audio files'))
                            ->relationship()
                            ->schema([
                                TextInput::make('description')
                                    ->label(t('Description'))
                                    ->required()
                                    ->maxLength(65535),

                                TextInput::make('url')
                                    ->label(t('URL'))
                                    ->url()
                                    ->maxLength(65535)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        static::trimUrlContent($set, $get, 'url');
                                    }),

                                TextInput::make('youtube_id')
                                    ->label(t('Youtube ID'))
                                    ->hint(t('To enbed a youtube video, add the id. On YouTube, when you hit "share", the id is the random-like string after https://youtu.be/')),

                                SpatieMediaLibraryFileUpload::make('file')
                                    ->label(t('File'))
                                    ->collection('comms_products')
                                    ->preserveFilenames()
                                    ->downloadable()
                                    ->maxSize(512000)
                                    ->disk('s3'),
                            ])
                            ->defaultItems(0)
                            ->addActionLabel(t('Add communication product'))
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected static function trimUrlContent(Forms\Set $set, Forms\Get $get, string $fieldName): void
    {
        $fieldValue = $get($fieldName);

        if (! $fieldValue) {
            return;
        }

        $set($fieldName, Str::trim($fieldValue));
    }
}
