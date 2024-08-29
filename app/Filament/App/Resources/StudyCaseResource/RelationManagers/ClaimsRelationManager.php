<?php

namespace App\Filament\App\Resources\StudyCaseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ClaimsRelationManager extends RelationManager
{
    protected static string $relationship = 'claims';

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

                Forms\Components\Repeater::make('evidences')
                    ->label(t('Evidence'))
                    ->relationship()
                    ->schema([
                        Forms\Components\RichEditor::make('matching_evidence')
                            ->label(t('Evidence'))
                            ->hint(t('Evidence that supports this claim statement'))
                            ->required(),

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
                            ->defaultItems(1)
                            ->addActionLabel(t('Add source of the evidence'))
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('indicators')
                            ->label(t('Indicator(s)'))
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('name')->label(t('Indicator'))->required(),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel(t('Add indicator'))
                            ->columnSpanFull(),

                    ])
                    ->defaultItems(1)
                    ->addActionLabel(t('Add evidence'))
                    ->columnSpanFull(),

            ]);
    }



    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('claim_statement')
            ->columns([
                Tables\Columns\TextColumn::make('claim_statement'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
