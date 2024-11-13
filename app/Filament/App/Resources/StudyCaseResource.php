<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use App\Models\Organisation;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
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
                                    ->maxLength(65535)
                                    ->columnSpanFull(),

                                Forms\Components\TextInput::make('year_of_development')
                                    ->label(t('Year of development'))
                                    ->required()
                                    ->numeric()
                                    ->minValue(1900)
                                    ->maxValue(3000),

                                Forms\Components\Select::make('languages')
                                    ->label(t('Language(s)'))
                                    ->hint(t('An initial list of language(s) will be provided, but if the language of your case is not listed, you will be able to type it.'))
                                    ->multiple()
                                    ->relationship('languages', 'name')
                                    ->required()
                                    ->preload(),

                                Forms\Components\TextInput::make('other_languages')
                                    ->label(t('Other language(s)'))
                                    ->hint(t('Please enter other language(s) here if they are not existed in the language(s) selection box above'))
                                    ->maxLength(255),

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
                                    ->maxLength(65535)
                                    ->columnSpanFull(),

                                Section::make(t('Leading organisation'))
                                    ->schema([
                                        Placeholder::make('leading_organisation')
                                            ->label(t('Organisation name'))
                                            ->content(fn(?StudyCase $record): string => $record === null ? auth()->user()->latestTeam->name : $record->team->name),

                                        Forms\Components\TextInput::make('contact_person_name')
                                            ->label(t('Contact person name'))
                                            ->required()
                                            ->maxLength(255),

                                        Forms\Components\TextInput::make('contact_person_email')
                                            ->label(t('Contact person email'))
                                            ->required()
                                            ->email()
                                            ->maxLength(255),
                                    ]),

                                Section::make(t('Partner organisation(s)'))
                                    ->schema([
                                        Forms\Components\Select::make('organisations')
                                            ->label(t('Partner organisation(s)'))
                                            ->hint(t('List of partner organisation(s) that worked in the development of the case'))
                                            ->multiple()
                                            ->relationship('organisations', 'name')
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->label(t('Name'))
                                                    ->required()
                                                    ->maxLength(255),
                                                Forms\Components\TextInput::make('website')
                                                    ->label(t('Website'))
                                                    ->url()
                                                    ->maxLength(255),
                                                Forms\Components\Textarea::make('note')
                                                    ->label(t('Note'))
                                                    ->maxLength(65535)
                                                    ->columnSpanFull(),
                                            ]),


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
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\RichEditor::make('target_audience')
                                    ->label(t('Description of the target audience(s)'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\RichEditor::make('target_audience_priorities_and_values')
                                    ->label(t('Target audience(s)\'s priorities and values'))
                                    ->hint(t('if you have more than one target audience/s, you can list them separately'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\RichEditor::make('framing')
                                    ->label(t('Framing(s) of the case'))
                                    ->hint(t('based on your audience\'s priorities and way of understanding the issues at hand'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\RichEditor::make('strategy_to_argue')
                                    ->label(t('Description of the strategy(ies) to argue the case'))
                                    ->hint(t('e.g., is it a comparison? A value and rights-based argument?'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\RichEditor::make('call_to_action')
                                    ->label(t('Call to action(s)'))
                                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'bulletList',
                                        'orderedList',
                                        'undo',
                                        'redo',
                                    ]),

                                Forms\Components\Textarea::make('note')
                                    ->label(t('Note'))
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                            ]),

                        Tabs\Tab::make('tab-3')
                            ->label(t('Communication Product(s)'))
                            ->icon('heroicon-m-paper-clip')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                Forms\Components\Repeater::make('communicationProducts')
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
                                            ->maxLength(65535),

                                        TextInput::make('youtube_id')
                                            ->label(t('Youtube ID'))
                                            ->hint(t('To enbed a youtube video, add the id. On YouTube, when you hit "share", the id is the random-like string after https://youtu.be/')),

                                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
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

                        Tabs\Tab::make('tab-4')
                            ->label(t('Photos'))
                            ->icon('heroicon-m-camera')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                Forms\Components\SpatieMediaLibraryFileUpload::make('cover_photo')
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

                                Forms\Components\SpatieMediaLibraryFileUpload::make('logo_image')
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

                                Forms\Components\Repeater::make('photos')
                                    ->label(t('Catalogue photo(s)'))
                                    ->hint(t('Please upload here up to 5 photos for the case entry into the catalogue. These photos will help us make your entry in the catalogue look great!'))
                                    ->relationship()
                                    ->schema([

                                        TextInput::make('description')
                                            ->label(t('Description'))
                                            ->required()
                                            ->maxLength(65535),

                                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
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
                                    ->addActionLabel(t('Add photo'))
                            ]),

                        Tabs\Tab::make('tab-6')
                            ->label(t('Confirmation'))
                            ->icon('heroicon-m-check-circle')
                            ->disabled($form->getRecord() == null)
                            ->schema([

                                Section::make(t('Case Submitter Confirmation'))
                                    ->icon('heroicon-o-check-circle')
                                    ->schema([
                                        // This checkbox is for submitter only, not for reviewer
                                        // It should be disabled for user with admin role
                                        Forms\Components\Checkbox::make('ready_for_review')
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
                                        Forms\Components\Checkbox::make('reviewed')
                                            ->label(t('I confirm that all content has been reviewed. This case is now ready for publishing.'))
                                            ->hint(t('This is to be confirmed by case reviewer'))
                                            ->disabled(!auth()->user()->isAdmin())
                                            ->columnSpanFull(),
                                    ]),

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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('year_of_development')
                    ->label(t('Year of development'))
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->wrapHeader(),
                Tables\Columns\IconColumn::make('ready_for_review')
                    ->label(t('Ready for review'))
                    ->boolean()
                    ->sortable()
                    ->wrapHeader(),
                Tables\Columns\IconColumn::make('reviewed')
                    ->label(t('Reviewed'))
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // study case can be edited only if reviewer has not reviewed it yet
                Tables\Actions\EditAction::make()->hidden(function ($record) {
                    return $record->reviewed;
                }),
                // view action only available when case can no longer be edited
                Tables\Actions\ViewAction::make()->hidden(function ($record) {
                    return !$record->reviewed;
                }),
                Tables\Actions\Action::make('preview_catalogue')
                    ->label('Preview')
                    ->icon('heroicon-o-book-open')
                    ->url(fn(StudyCase $record): string => '/cases/' . $record->id)
                    ->openUrlInNewTab()
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
