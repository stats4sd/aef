<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\StudyCaseResource\Pages;
use App\Models\StudyCase;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(t('Title'))
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('year_of_development')
                    ->label(t('Year of development'))
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->wrapHeader(),
                Tables\Columns\TextColumn::make('status')
                    ->label(t('Status'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // study case can be edited only if reviewer has not reviewed it yet
                Tables\Actions\EditAction::make()
                    ->url(fn($record) => static::getUrl('edit-basic-information', ['record' => $record]))
                    ->hidden(function ($record) {
                        return $record->reviewed;
                    }),
                // view action only available when case can no longer be edited
                Tables\Actions\ViewAction::make()->hidden(function ($record) {
                    return !$record->reviewed;
                }),
                Tables\Actions\Action::make('preview_catalogue')
                    ->label(t('Preview'))
                    ->icon('heroicon-o-book-open')
                    ->url(fn(StudyCase $record): string => '/cases/' . $record->id)
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyCases::route('/'),
            'create' => Pages\CreateStudyCase::route('/create'),
            'edit-basic-information' => Pages\EditBasicInformation::route('/{record}/edit-basic-information'),
            'edit-case-details' => Pages\EditCaseDetails::route('/{record}/edit-case-details'),
            'edit-communication-products' => Pages\EditCommunicationProducts::route('/{record}/edit-communication-products'),
            'edit-photos' => Pages\EditPhotos::route('/{record}/edit-photos'),
            'view' => Pages\ViewStudyCase::route('/{record}'),
            'manage-case-study-claims' => Pages\ManageCaseStudyClaims::route('/{record}/manage-case-study-claims'),
        ];
    }

    protected static function trimUrlContent(Forms\Set $set, Forms\Get $get, string $fieldName): void
    {
        $fieldValue = $get($fieldName);

        if (!$fieldValue) {
            return;
        }

        $set($fieldName, Str::trim($fieldValue));
    }
}
