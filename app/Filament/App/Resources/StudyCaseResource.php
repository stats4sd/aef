<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use App\Models\Organisation;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Builder\Block;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\StudyCaseResource\Pages;
use App\Filament\App\Resources\StudyCaseResource\RelationManagers;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    // define translatable string in function
    public static function getModelLabel(): string
    {
        return t('Case');
    }

    public static function getPluralModelLabel(): string
    {
        return t('Cases');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('tab-1')
                            ->label(t('Basic Information'))
                            ->icon('heroicon-m-information-circle')
                            ->schema([

                                Forms\Components\TextInput::make('title')
                                    ->label(t('Title'))
                                    ->required()
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('year_of_development')
                                    ->label(t('Year of development'))
                                    ->required()
                                    ->numeric(),

                                Forms\Components\Select::make('languages')
                                    ->label(t('Language(s)'))
                                    ->hint(t('An initial list of language(s) will be provided, but if the language of your case is not listed, you will be able to type it.'))
                                    ->multiple()
                                    ->relationship('languages', 'name')
                                    ->required()
                                    ->preload(),

                                Forms\Components\TextInput::make('other_languages')
                                    ->label(t('Other language(s)'))
                                    ->hint(t('Please enter other language(s) here if they are not existed in the language(s) selection box above')),

                                Forms\Components\Select::make('tags')
                                    ->label(t('Tag(s) / keyword(s)'))
                                    ->multiple()
                                    ->relationship('tags', 'name')
                                    ->required()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label(t('Name'))
                                            ->unique()
                                            ->required(),
                                    ]),

                                Forms\Components\Select::make('countries')
                                    ->label(t('Country(ies) covered'))
                                    ->hint(t('Select the country(ies) covered in your case'))
                                    ->multiple()
                                    ->relationship('countries', 'name')
                                    ->required()
                                    ->preload(),

                                Forms\Components\Textarea::make('geographic_area')
                                    ->label(t('Geographic area'))
                                    ->hint(t('If you want to be more specific about the geographic area, please describe it here'))
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),

                                Placeholder::make('leading_organisation')
                                    ->label(t('Leading organisation'))
                                    ->content(fn(?StudyCase $record): string => $record === null ? auth()->user()->latestTeam->name : $record->team->name),

                                Forms\Components\TextInput::make('contact_person_name')
                                    ->label(t('Leading organisation contact person name'))
                                    ->required(),

                                Forms\Components\TextInput::make('contact_person_email')
                                    ->label(t('Leading organisation contact person email'))
                                    ->required(),

                                Forms\Components\Select::make('organisations')
                                    ->label(t('Partner organisation(s)'))
                                    ->hint(t('List of partner organisation(s) that worked in the development of the case'))
                                    ->multiple()
                                    ->relationship('organisations', 'name')
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label(t('Name'))
                                            ->unique()
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('website')
                                            ->label(t('Website'))
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('contact_person_name')
                                            ->label(t('Contact person name'))
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('contact_person_email')
                                            ->label(t('Contact person email'))
                                            ->email()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('note')
                                            ->label(t('Note'))
                                            ->columnSpanFull(),
                                    ]),

                            ]),

                        Tabs\Tab::make('tab-2')
                            ->label(t('Case Details'))
                            ->icon('heroicon-m-document-text')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                Forms\Components\RichEditor::make('statement')
                                    ->label(t('Statement(s)'))
                                    ->hint(t('e.g., If __________ then __________'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\RichEditor::make('target_audience')
                                    ->label(t('Description of the target audience(s)'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\RichEditor::make('target_audience_priorities_and_values')
                                    ->label(t('Target audience(s)\'s priorities and values'))
                                    ->hint(t('if you have more than one target audience/s, you can list them separately'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\RichEditor::make('framing')
                                    ->label(t('Framing(s) of the case'))
                                    ->hint(t('based on your audience\'s priorities and way of understanding the issues at hand'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\RichEditor::make('strategy_to_argue')
                                    ->label(t('Description of the strategy(ies) to argue the case'))
                                    ->hint(t('e.g., is it a comparison? A value and rights-based argument?'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\RichEditor::make('call_to_action')
                                    ->label(t('Call to action(s)'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->disableToolbarButtons([
                                        'attachFiles',
                                        'strike',
                                    ]),

                                Forms\Components\Textarea::make('note')
                                    ->label(t('Note'))
                                    ->columnSpanFull(),
                            ]),


                        // hide tab-3 as claims will be entered via relation manager
                        // we can consider to remove tab-3 after final confirmed that this tab is no longer necessary
                        Tabs\Tab::make('tab-3')
                            ->label(t('Claims and Evidence'))
                            ->icon('heroicon-m-sparkles')
                            ->disabled($form->getRecord() == null)
                            ->hidden()
                            ->schema([

                                /*
                                Forms\Components\Repeater::make('claims')
                                    ->label(t('Claims'))
                                    ->hint(t('You will be able to enter as many claims and pieces of evidence as needed. If one piece of evidence is used to support multiple claims, please copy it again.'))
                                    ->relationship()
                                    ->schema([

                                        Forms\Components\RichEditor::make('claim_statement')
                                            ->label(t('Claim statement'))
                                            ->hint(t('Claim made in the case statement'))
                                            ->required(),

                                        Forms\Components\Repeater::make('evidences')
                                            ->label(t('Evidence'))
                                            ->relationship()
                                            ->schema([
                                                Forms\Components\RichEditor::make('matching_evidence')
                                                    ->label(t('Evidence'))
                                                    ->hint(t('Evidence that supports this claim statement'))
                                                    ->required(),

                                                Forms\Components\Repeater::make('aspects')
                                                    ->label(t('Aspect(s)'))
                                                    ->relationship()
                                                    ->schema([
                                                        Forms\Components\TextInput::make('name')->label(t('Aspect'))->required(),
                                                    ])
                                                    ->defaultItems(0)
                                                    ->addActionLabel(t('Add aspect'))
                                                    ->columnSpanFull(),

                                                Forms\Components\Repeater::make('evidenceAttachments')
                                                    ->label(t('Source(s) of the evidence'))
                                                    ->hint(t('Description, web address and link to upload evidence attachment: documents, videos and/or audio files'))
                                                    ->relationship()
                                                    ->schema([
                                                        TextInput::make('description')->label(t('Description'))->required(),
                                                        TextInput::make('url')->label(t('URL')),
                                                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                                                            ->label(t('File'))
                                                            ->collection('file')
                                                            ->preserveFilenames()
                                                            ->downloadable()
                                                            ->maxSize(10240),
                                                    ])
                                                    ->defaultItems(0)
                                                    ->addActionLabel(t('Add source of the evidence'))
                                                    ->columnSpanFull(),

                                            ])
                                            ->defaultItems(0)
                                            ->addActionLabel(t('Add evidence'))
                                            ->columnSpanFull(),

                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel(t('Add claim'))
                                    ->columnSpanFull(),

                                */]),

                        Tabs\Tab::make('tab-4')
                            ->label(t('Others'))
                            ->icon('heroicon-m-paper-clip')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                Forms\Components\Repeater::make('communicationProducts')
                                    ->label(t('Communication product(s)'))
                                    ->hint(t('Description, web address and link to upload communication products: documents, videos and/or audio files'))
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('description')->label(t('Description'))->required(),
                                        TextInput::make('url')->label(t('URL')),
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                                            ->label(t('File'))
                                            ->collection('file')
                                            ->preserveFilenames()
                                            ->downloadable()
                                            ->maxSize(10240),
                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel(t('Add communication product'))
                                    ->columnSpanFull(),

                                Forms\Components\Repeater::make('references')
                                    ->label(t('Bibliography and reference(s)'))
                                    ->hint(t('This lists the sources of the evidence that was gathered. If the source can be found online, please provide a URL. If the source is a publication or published media, please provide a full reference and URL if available. If the source not published, please describe it and, if possible, give contact details of the person who has access to them.'))
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('description')->label(t('Description'))->required(),
                                        TextInput::make('url')->label(t('URL')),
                                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                                            ->label(t('File'))
                                            ->collection('file')
                                            ->preserveFilenames()
                                            ->downloadable()
                                            ->maxSize(10240),
                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel(t('Add bibliography and reference'))
                                    ->columnSpanFull(),

                                // TODO: not sure how to add description as custom properties in SpatieMediaLibraryFileUpload...
                                // TODO: unable to add restriction to only accept image files, because acceptsMimeTypes() is not supported in filament plugins
                                Forms\Components\SpatieMediaLibraryFileUpload::make('photos')
                                    ->label(t('Catalogue photos'))
                                    ->hint(t('Please upload here up to 5 photos for the case entry into the catalogue. These photos will help us make your entry in the catalogue look great!'))
                                    ->collection('photos')
                                    ->multiple()
                                    ->reorderable()
                                    ->downloadable()
                                    ->preserveFilenames()
                                    // ->acceptsMimeTypes(['image/jpeg'])
                                    ->maxFiles(5)
                                    // set maximum file size is 10 MB
                                    ->maxSize(10240)
                                    ->columnSpanFull(),
                            ]),

                        Tabs\Tab::make('tab-5')
                            ->label(t('Confirmation'))
                            ->icon('heroicon-m-check-circle')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                // This form in app panel is commonly used in admin panel.
                                // We cannot determine whether user is in app panel or in admin panel by checking current class name.
                                // (because class name will be app panel class name when admin panel called this form in app panel)
                                // TODO: We need to disable checkbox by checking whether the logged in user is a reviewer

                                // This checkbox is for submitter only, not for reviewer
                                // It should be disabled in admin panel
                                // TODO: disable it if logged in user is a reviewer
                                Forms\Components\Checkbox::make('ready_for_review')
                                    ->label(t('I confirm that all content is correct. This case is now ready for reviewer to review.'))
                                    ->hint(t('This is to be confirmed by case submitter'))
                                    ->columnSpanFull(),

                                // This checkbox is for reviewer only, not for submitter
                                // It should be disabled in app panel
                                // TODO: disable it if logged in user is not a reviewer
                                Forms\Components\Checkbox::make('reviewed')
                                    ->label(t('I confirm that all content has been reviewed. This case is now ready for publishing.'))
                                    ->hint(t('This is to be confirmed by case reviewer'))
                                    ->disabled()
                                    ->columnSpanFull(),
                            ]),

                    ])->columnSpanFull()
                    ->persistTabInQueryString()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(t('Title'))
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year_of_development')
                    ->label(t('Year of development'))
                    ->wrap()
                    ->sortable(),
                Tables\Columns\IconColumn::make('ready_for_review')
                    ->label(t('Ready for review'))
                    ->boolean(),
                Tables\Columns\IconColumn::make('reviewed')
                    ->label(t('Reviewed'))
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->hidden(function ($record) {
                    return $record->reviewed;
                }),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ClaimsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyCases::route('/'),
            'create' => Pages\CreateStudyCase::route('/create'),
            'edit' => Pages\EditStudyCase::route('/{record}/edit'),
            'view' => Pages\ViewStudyCase::route('/{record}'),
        ];
    }
}
