<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Enums\StudyCaseStatus;
use App\Filament\App\Resources\StudyCaseResource;
use App\Models\StudyCase;
use Filament\Actions;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditBasicInformation extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public static function getNavigationLabel(): string
    {
        return t('Basic Information');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-pencil-square';
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
        return $this->getResource()::getUrl('edit-case-details', ['record' => $this->record->id]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Basic Information')
                ->schema([

                    Hidden::make('order')
                        ->default(fn() => (StudyCase::max('order') ?? 0) + 1),

                    TextInput::make('title')
                        ->label(t('Title'))
                        ->required()
                        ->maxLength(65535)
                        ->columnSpanFull(),

                    TextInput::make('year_of_development')
                        ->label(t('Year of development'))
                        ->required()
                        ->numeric()
                        ->minValue(1900)
                        ->maxValue(3000),

                    Select::make('languages')
                        ->label(t('Language(s)'))
                        ->hint(t('An initial list of language(s) will be provided, but if the language of your case is not listed, you will be able to type it.'))
                        ->multiple()
                        ->relationship('languages', 'name')
                        ->required()
                        ->preload(),

                    TextInput::make('other_languages')
                        ->label(t('Other language(s)'))
                        ->hint(t('Please enter other language(s) here if they do not existed in the language(s) selection box above'))
                        ->maxLength(255),

                    Select::make('tags')
                        ->label(t('Tag(s) / keyword(s)'))
                        ->multiple()
                        ->relationship('tags', 'name')
                        ->required()
                        ->preload()
                        ->createOptionForm([
                            TextInput::make('name')
                                ->label(t('Name'))
                                ->unique()
                                ->required(),
                        ]),

                    Select::make('countries')
                        ->label(t('Country(ies) covered'))
                        ->hint(t('Select the country(ies) covered in your case'))
                        ->multiple()
                        ->relationship('countries', 'name')
                        ->required()
                        ->preload(),

                    Textarea::make('geographic_area')
                        ->label(t('Geographic area'))
                        ->hint(t('If you want to be more specific about the geographic area, please describe it here'))
                        ->rows(3)
                        ->maxLength(65535)
                        ->columnSpanFull(),

                    Section::make(t('Leading organisation'))
                        // hide this section when status is Proposal or Ready for development
                        ->hidden(fn ($record) => $record->status == StudyCaseStatus::Proposal)
                        ->schema([
                            Placeholder::make('leading_organisation')
                                ->label(t('Organisation name'))
                                ->content(fn(?StudyCase $record): string => $record === null ? auth()->user()->latestTeam->name : $record->team->name),

                            TextInput::make('contact_person_name')
                                ->label(t('Contact person name'))
                                ->required()
                                ->maxLength(255),

                            TextInput::make('contact_person_email')
                                ->label(t('Contact person email'))
                                ->required()
                                ->email()
                                ->maxLength(255),
                        ]),

                    Section::make(t('Partner organisation(s)'))
                        // hide this section when status is Proposal or Ready for development
                        ->hidden(fn ($record) => $record->status == StudyCaseStatus::Proposal)
                        ->schema([
                            Select::make('organisations')
                                ->label(t('Partner organisation(s)'))
                                ->hint(t('List of partner organisation(s) that worked in the development of the case'))
                                ->multiple()
                                ->relationship('organisations', 'name')
                                ->preload()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->label(t('Name'))
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('website')
                                        ->label(t('Website'))
                                        ->url()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Set $set, Get $get) {
                                            static::trimUrlContent($set, $get, 'website');
                                        }),
                                    Textarea::make('note')
                                        ->label(t('Note'))
                                        ->maxLength(65535)
                                        ->columnSpanFull(),
                                ]),
                        ]),
                ]),
        ]);
    }
}
