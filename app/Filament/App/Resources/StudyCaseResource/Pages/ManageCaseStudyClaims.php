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
        // App panel > Study case > Claims and Evidence tab page > Create Claim button
        // 
        // Note: In filament popup modal form, it looks like the translation string of browser default locale is always displayed
        // regardless of user selected language (Spanish or French) in application
        //
        // It may be related to a user reported case forwarded by Romina on 2025-12-11

        return $form
            ->schema([

                Forms\Components\Textarea::make('claim_statement')

                    ->label(function (?array $state): string {

                        // due to unknown cause, translation string of browser default locale is always obtained regardless of user selected locale...

                        // translation strings for quick reference:
                        // en: 'Claim statement'
                        // es: 'Afirmacion de la declaración'
                        // fr: 'Énoncé de l\'affirmation'

                        // user selected locale can be obtained properly
                        $locale = app()->getLocale();

                        // as a temporary workaround, we obtain locale and return the corresponding hardcoded translation string
                        $label = 'Claim statement';

                        if ($locale == 'en') {
                            $label = 'Claim statement';
                        } else if ($locale == 'es') {
                            $label = 'Afirmacion de la declaración';
                        } else if ($locale == 'fr') {
                            $label = 'Énoncé de l\'affirmation';
                        }

                        return $label;
                    })

                    ->hint(function (?array $state): string {

                        // due to unknown cause, translation string of browser default locale is always obtained regardless of user selected locale...

                        // translation strings for quick reference:
                        // en: Claim made in the case statement
                        // es: Afirmacion formulada en la declaración del caso
                        // fr: Affirmation faite dans l’énoncé du cas                        

                        // user selected locale can be obtained properly
                        $locale = app()->getLocale();

                        // as a temporary workaround, we obtain locale and return the corresponding hardcoded translation string
                        $label = 'Claim statement';

                        if ($locale == 'en') {
                            $label = 'Claim made in the case statement';
                        } else if ($locale == 'es') {
                            $label = 'Afirmacion formulada en la declaración del caso';
                        } else if ($locale == 'fr') {
                            $label = 'Affirmation faite dans l’énoncé du cas';
                        }

                        return $label;
                    })

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
                Tables\Actions\EditAction::make()
                    ->url(fn (Model $record, $livewire): string => ClaimResource::getUrl(
                        'edit',
                       ['record' => $record, 'ownerRecord' => $livewire->getOwnerRecord()->getKey()],
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
