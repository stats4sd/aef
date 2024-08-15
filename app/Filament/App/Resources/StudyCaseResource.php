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
                // TODO: add selection box to select partner organisations
                // Forms\Components\Select::make('partnerOrgnisations')
                //     ->multiple()
                //     ->relationship('partnerOrgnisations', 'name'),

                Forms\Components\TextInput::make('year_of_development')
                    ->label(t('Year of development'))
                    ->numeric(),

                Forms\Components\Textarea::make('title')
                    ->label(t('Title'))
                    ->rows(10)
                    ->columnSpanFull(),

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
                    ->label(t('Target audience(s)'))
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
                    ->label(t('Strategy(ies) to argue the case'))
                    ->hint(t('e.g., is it a comparison? A value and rights-based argument?'))
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\Textarea::make('note')
                    ->label(t('Note'))
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('communicationProducts')
                    ->label(t('Communication products'))
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->label(t('Description'))->required(),
                        TextInput::make('url')->label(t('Url')),
                        // TODO: add restriction for file size
                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                            ->label(t('File'))
                            ->collection('file')
                            ->preserveFilenames()
                            ->downloadable(),
                    ])
                    ->defaultItems(0)
                    ->addActionLabel(t('Add communication product'))
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('references')
                    ->label(t('Bibliography and references'))
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->label(t('Description'))->required(),
                        TextInput::make('url')->label(t('Url')),
                        // TODO: add restriction for file size
                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                            ->label(t('File'))
                            ->collection('file')
                            ->preserveFilenames()
                            ->downloadable(),
                    ])
                    ->defaultItems(0)
                    ->addActionLabel(t('Add bibliography and reference'))
                    ->columnSpanFull(),

                // TODO: add restriction for file size
                // TODO: add restriction for image files only
                Forms\Components\SpatieMediaLibraryFileUpload::make('photos')
                    ->label(t('Catalogue photos'))
                    ->hint(t('Please upload here up to 5 photos for the case entry into the catalogue. These photos will help us make your entry in the catalogue look great!'))
                    ->collection('photos')
                    ->multiple()
                    ->preserveFilenames()
                    ->downloadable()
                    ->maxFiles(5)
                    ->columnSpanFull(),


                // TODO: it is not working if it is located below file upload component
                Forms\Components\Checkbox::make('ready_for_review')
                    ->label(t('I confirm that all content is correct. This case is now ready for reviewer to review.'))
                    ->columnSpanFull(),

                // TODO: show it in admin panel only
                Forms\Components\Checkbox::make('reviewed')
                    ->label(t('I confirm that all content have been reviewed. This case is now ready for publishing.'))
                    ->columnSpanFull(),
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
