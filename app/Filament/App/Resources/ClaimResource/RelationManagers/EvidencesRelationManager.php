<?php

namespace App\Filament\App\Resources\ClaimResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class EvidencesRelationManager extends RelationManager
{
    protected static string $relationship = 'evidences';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\RichEditor::make('matching_evidence')
                    ->label(t('Evidence'))
                    ->hint(t('Evidence that supports this claim statement'))
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'undo',
                        'redo',
                        'attachFiles',
                    ]),

                Forms\Components\Repeater::make('evidenceAttachments')
                    ->label(t('Evidence source(s)'))
                    ->relationship()
                    ->schema([

                        Forms\Components\TextInput::make('description')
                            ->label(t('Description'))
                            ->required()
                            ->maxLength(65535),

                        Forms\Components\TextInput::make('url')
                            ->label(t('URL'))
                            ->url()
                            ->maxLength(65535),

                        Forms\Components\SpatieMediaLibraryFileUpload::make('file')
                            ->label(t('File'))
                            ->collection('evidence')
                            ->preserveFilenames()
                            ->downloadable()
                            ->maxSize(25600)
                            ->disk('s3'),

                    ])
                    ->defaultItems(1)
                    ->addActionLabel(t('Add another source'))
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('indicators')
                    ->label(t('Indicator(s)'))
                    ->hint(t('What indicators does this evidence give information on? Indicators can be qualitative or quantitative, and may describe characteristics or other aspects of the problem that is addressed.'))
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(t('Indicator'))
                            ->required(),
                    ])
                    ->defaultItems(1)
                    ->addActionLabel(t('Add another indicator'))
                    ->columnSpanFull(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('matching_evidence')
            ->columns([
                // customise TextColumn content to show claim statement without markdown
                Tables\Columns\TextColumn::make('matching_evidence')
                    ->getStateUsing(function (Model $record) {
                        return strip_tags($record->matching_evidence);
                    })
                    ->label(t('Matching evidence'))
                    ->wrap()
                    ->limit(100)
                    ->searchable(),

                // P.S. relationship name needs to be in lowercase, otherwise it does not work
                Tables\Columns\TextColumn::make('evidenceattachments_count')
                    ->label(t('Sources count'))
                    ->counts('evidenceattachments'),

                Tables\Columns\TextColumn::make('indicators_count')
                    ->label(t('Indicators count'))
                    ->counts('indicators'),
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
                // matching evidence is a long rich text which is not suitable to be showed as modal heading
                Tables\Actions\EditAction::make()
                    ->modalHeading(t('Edit Evidence')),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(t('Delete Evidence')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
