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
use App\Filament\Admin\Resources\StudyCaseResource\Pages;
use App\Filament\Admin\Resources\StudyCaseResource\RelationManagers;

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
        return [
            AppPanelClaimsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyCases::route('/'),

            // disable route for creating a new study case
            // reviewer should not be able to create new study case.
            // study case should be created by leading organisation member.

            // 'create' => Pages\CreateStudyCase::route('/create'),

            'edit' => Pages\EditStudyCase::route('/{record}/edit'),
        ];
    }
}
