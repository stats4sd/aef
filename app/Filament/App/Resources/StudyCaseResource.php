<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use App\Models\Organisation;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
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
                // TODO: leading organisation is team. It is no longer pointing to organisation
                // Forms\Components\Select::make('leading_organisation_id')
                //     ->relationship('leadingOrganisation', 'name')
                //     ->label('Leading organisation')
                //     ->required()
                //     ->searchable()
                //     ->preload(),

                // TODO: add selection box to select partner organisations
                // Forms\Components\Select::make('partnerOrgnisations')
                //     ->multiple()
                //     ->relationship('partnerOrgnisations', 'name'),

                Forms\Components\TextInput::make('year_of_development')
                    ->label('Year of development')
                    ->numeric(),

                Forms\Components\Textarea::make('title')
                    ->label('Title')
                    ->rows(10)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('statement')
                    ->label('Statement(s)')
                    ->hint('e.g., If __________ then __________')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('target_audience')
                    ->label('Target audience(s)')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('call_to_action')
                    ->label('Call to action(s)')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('target_audience_priorities_and_values')
                    ->label('Target audience(s)\'s priorities and values')
                    ->hint('if you have more than one target audience/s, you can list them separately')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('framing')
                    ->label('Framing(s) of the case')
                    ->hint('based on your audience\'s priorities and way of understanding the issues at hand')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('strategy_to_argue')
                    ->label('Strategy(ies) to argue the case')
                    ->hint('e.g., is it a comparison? A value and rights-based argument?')
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('communicationProducts')
                    ->label('Communication products')
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->required(),
                        TextInput::make('url'),
                        // TODO: add restriction for file size
                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                            ->collection('file')
                            ->preserveFilenames()
                            ->downloadable(),
                    ])
                    ->defaultItems(0)
                    ->addActionLabel('Add communication product')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('references')
                    ->label('Bibliography and references')
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->required(),
                        TextInput::make('url'),
                        // TODO: add restriction for file size
                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                            ->collection('file')
                            ->preserveFilenames()
                            ->downloadable(),
                    ])
                    ->defaultItems(0)
                    ->addActionLabel('Add bibliography and reference')
                    ->columnSpanFull(),

                // TODO: add restriction for file size
                // TODO: add restriction for image files only
                Forms\Components\SpatieMediaLibraryFileUpload::make('photos')
                    ->label('Catalogue photos')
                    ->hint('Please upload here up to 5 photos for the case entry into the catalogue. These photos will help us make your entry in the catalogue look great!')
                    ->collection('photos')
                    ->multiple()
                    ->preserveFilenames()
                    ->downloadable()
                    ->maxFiles(5)
                    ->columnSpanFull(),

                // TODO: check why it is disabled
                Forms\Components\Checkbox::make('ready_for_review')
                    ->label('I confirm that all content is correct. This case is now ready for reviewer to review.')
                    ->columnSpanFull(),

                // TODO: show it in admin panel only
                Forms\Components\Checkbox::make('reviewed')
                    ->label('I confirm that all content have been reviewed. This case is now ready for publishing.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TODO: list view shows all cases belong to this team.
                // Team is the leading organisation implicitly.
                // It is no longer necessary to show leading organisation
                // Tables\Columns\TextColumn::make('leadingOrganisation.name')
                //     ->label(t('Leading organisation'))
                //     ->sortable(),
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
            //
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
