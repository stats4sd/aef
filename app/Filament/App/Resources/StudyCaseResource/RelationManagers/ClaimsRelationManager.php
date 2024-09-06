<?php

namespace App\Filament\App\Resources\StudyCaseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\App\Resources\ClaimResource;
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
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('claim_statement')
            ->columns([

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
                // redirect to Claim edit page instead of editing a claim in popup modal
                Tables\Actions\EditAction::make()
                    ->url(fn(Model $record, $livewire): string => ClaimResource::getUrl(
                        'edit',
                        ['record' => $record, 'ownerRecord' => $livewire->ownerRecord->getKey()],
                        true,
                        null,
                        auth()->user()->getDefaultTenant(Filament::getCurrentPanel())
                    )),

                // customise modal heading in popup modal
                // claim statement is a long rich text which is not suitable to be showed as modal heading
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
