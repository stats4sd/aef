<?php

namespace App\Filament\App\Resources\StudyCaseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ClaimsRelationManager extends RelationManager
{
    protected static string $relationship = 'claims';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return t('Claims and Evidence');
    }

    public function form(Form $form): Form
    {
        // how to show modal popup with a bigger size?
        return $form
            ->schema([

                Forms\Components\RichEditor::make('claim_statement')
                    ->label(t('Claim statement'))
                    ->hint(t('Claim made in the case statement'))
                    ->required()
                    ->columnSpanFull(),

                // add section to embed form elements with a bigger border, change section background color by adding CSS attribute
                Section::make()
                    ->schema([

                        Forms\Components\Repeater::make('evidences')
                            ->label(t('Evidence'))
                            ->relationship()
                            ->schema([

                                Forms\Components\RichEditor::make('matching_evidence')
                                    ->label(t('Evidence'))
                                    ->hint(t('Evidence that supports this claim statement'))
                                    ->required(),

                                Section::make()
                                    ->schema([
                                        Forms\Components\Repeater::make('evidenceAttachments')
                                            ->label(t('Source(s) of the evidence'))
                                            ->hint(t('Description, web address and link to upload evidence attachment: documents, videos and/or audio files'))
                                            ->relationship()
                                            ->schema([

                                                TextInput::make('description')
                                                    ->label(t('Description'))
                                                    ->required(),

                                                TextInput::make('url')
                                                    ->label(t('URL')),

                                                Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                                                    ->label(t('File'))
                                                    ->collection('file')
                                                    ->preserveFilenames()
                                                    ->downloadable()
                                                    ->maxSize(10240),

                                            ])
                                            ->defaultItems(1)
                                            ->addActionLabel(t('Add source of the evidence'))
                                            ->columnSpanFull(),

                                    ])
                                    ->extraAttributes([
                                        'style' => 'background-color: #ffb;'
                                    ]),

                                Section::make()
                                    ->schema([
                                        Forms\Components\Repeater::make('indicators')
                                            ->label(t('Indicator(s)'))
                                            ->relationship()
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label(t('Indicator'))
                                                    ->required(),
                                            ])
                                            ->defaultItems(1)
                                            ->addActionLabel(t('Add indicator'))
                                            ->columnSpanFull(),
                                    ])
                                    ->extraAttributes([
                                        'style' => 'background-color: #fcf;'
                                    ]),

                            ])
                            ->defaultItems(1)
                            ->addActionLabel(t('Add evidence'))
                            ->columnSpanFull(),

                    ])
                    ->extraAttributes([
                        'style' => 'background-color: #af6;'
                    ]),

            ]);
    }



    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('claim_statement')
            ->columns([

                // do not show row index, as it will be confusing in keyword search result
                // TextColumn::make('index')
                //     ->rowIndex(),

                // customise TextColumn content to show claim statement without markdown
                Tables\Columns\TextColumn::make('claim_statement')
                    ->getStateUsing(function (Model $record) {
                        return strip_tags($record->claim_statement);
                    })
                    ->label(t('Claim statement'))
                    ->wrap()
                    ->limit(100)
                    ->searchable(),

                Tables\Columns\TextColumn::make('evidences_count')
                    ->label(t('Evidence count'))
                    ->counts('evidences'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // hide "Create & create another" button in popup modal
                Tables\Actions\CreateAction::make()
                    ->createAnother(false),
            ])
            ->actions([
                // customise modal heading in popup modal
                // claim statement is a long rich text which is not suitable to be showed as modal heading
                Tables\Actions\EditAction::make()
                    ->modalHeading(t('Edit claim')),
                Tables\Actions\ViewAction::make()
                    ->modalHeading(t('View claim')),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(t('Delete claim')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
