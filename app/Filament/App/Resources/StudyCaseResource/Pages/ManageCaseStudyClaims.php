<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\ClaimResource;
use App\Filament\App\Resources\StudyCaseResource;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class ManageCaseStudyClaims extends ManageRelatedRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected static string $relationship = 'claims';

    public static function getNavigationLabel(): string
    {
        return t('Claims and Evidence');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-arrow-trending-up';
    }

    public function getTitle(): string
    {
        return t('Claims and Evidence');
    }

    public function form(Form $form): Form
    {
        // how to show modal popup with a bigger size?
        return $form
            ->schema([

                Forms\Components\Textarea::make('claim_statement')
                    ->label(t('Claim statement'))
                    ->hint(t('Claim made in the case statement'))
                    ->required()
                    ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                    ->columnSpanFull(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('claim_statement')
            ->columns([

                Tables\Columns\TextColumn::make('claim_statement')
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
                //                Tables\Actions\EditAction::make()
                //                    ->url(fn (Model $record, $livewire): string => ClaimResource::getUrl(
                //                        'edit',
                //                        ['record' => $record, 'ownerRecord' => $livewire->getOwnerRecord()->getKey()],
                //                        true,
                //                        null,
                //                        auth()->user()->getDefaultTenant(Filament::getCurrentPanel())
                //                    )),

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
