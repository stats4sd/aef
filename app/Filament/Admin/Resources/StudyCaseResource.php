<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\StudyCaseResource as AppPanelStudyCaseResource;
use App\Filament\App\Resources\StudyCaseResource\RelationManagers\ClaimsRelationManager as AppPanelClaimsRelationManager;
use App\Filament\Admin\Resources\StudyCaseResource\RelationManagers;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use App\Filament\App\Resources\StudyCaseResource\Pages;
use App\Filament\Admin\Resources\StudyCaseResource\Pages\ListStudyCases as AdminPanelListStudyCases;


class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\EditBasicInformation::class,
            Pages\EditCaseDetails::class,
            Pages\EditCommunicationProducts::class,
            Pages\EditPhotos::class,
            Pages\ManageCaseStudyClaims::class,
            Pages\EditConfirmation::class,
        ]);
    }

    // define translatable string in function
    public static function getModelLabel(): string
    {
        return t('Case');
    }

    public static function getPluralModelLabel(): string
    {
        return t('Cases');
    }

    // re-use app panel Study case form
    public static function form(Form $form): Form
    {
        return AppPanelStudyCaseResource::form($form);
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
                Tables\Columns\TextColumn::make('team.name')
                    ->label(t('Leading organisation'))
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->wrapHeader(),
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
                TernaryFilter::make('ready_for_review')->label(t('Ready for review')),
                TernaryFilter::make('reviewed')->label(t('Reviewed')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('preview_catalogue')
                                ->label(t('Preview'))
                                ->icon('heroicon-o-book-open')
                                ->url(fn (StudyCase $record): string => '/cases/' . $record->id)
                                ->openUrlInNewTab()
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // re-use app panel Study case relation manager for claims
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            // use admin panel ListStudyCases, so that it will use table() function of this class
            'index' => AdminPanelListStudyCases::route('/'),

            'edit-basic-information' => Pages\EditBasicInformation::route('/{record}/edit-basic-information'),
            'edit-case-details' => Pages\EditCaseDetails::route('/{record}/edit-case-details'),
            'edit-communication-products' => Pages\EditCommunicationProducts::route('/{record}/edit-communication-products'),
            'edit-photos' => Pages\EditPhotos::route('/{record}/edit-photos'),
            'edit-confirmation' => Pages\EditConfirmation::route('/{record}/edit-confirmation'),
            'view' => Pages\ViewStudyCase::route('/{record}'),
            'manage-case-study-claims' => Pages\ManageCaseStudyClaims::route('/{record}/manage-case-study-claims'),
        ];
    }

}
