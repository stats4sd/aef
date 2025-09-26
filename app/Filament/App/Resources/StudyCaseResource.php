<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\StudyCaseStatus;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\SubNavigationPosition;
use Filament\Forms\Components\Placeholder;
use App\Filament\App\Resources\StudyCaseResource\Pages;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getRecordSubNavigation(Page $page): array
    {
        // hardcode to check page's route name to determine if it is the "view page" for Claims nad Evidence
        if ($page instanceof ViewRecord || 
            $page->getRoutename() == 'filament.app.resources.study-cases.view-case-study-claims' ||
            $page->getRoutename() == 'filament.admin.resources.study-cases.view-case-study-claims') {

            $navigation = [
                Pages\ViewBasicInformation::class,
                Pages\ViewCaseDetails::class,
                Pages\ViewCaseStudyClaims::class,
                Pages\ViewCommunicationProducts::class,
                Pages\ViewPhotos::class,
            ];

            // show confirmation step if:
            // 1. study case status is not proposal OR
            // 2. logged in user is admin
            if ($page->getRecord()?->status !== StudyCaseStatus::Proposal || auth()->user()->isAdmin()) {
                $navigation[] = Pages\ViewConfirmation::class;
            }

        } else {

            $navigation = [
                Pages\EditBasicInformation::class,
                Pages\EditCaseDetails::class,
                Pages\ManageCaseStudyClaims::class,
                Pages\EditCommunicationProducts::class,
                Pages\EditPhotos::class,
            ];

            // show confirmation step if:
            // 1. study case status is not proposal OR
            // 2. logged in user is admin
            if ($page->getRecord()?->status !== StudyCaseStatus::Proposal || auth()->user()->isAdmin()) {
                $navigation[] = Pages\EditConfirmation::class;
            }
        }

        return $page->generateNavigationItems($navigation);
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
                    ->badge()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([                
                // view action only available when case can no longer be edited
                Tables\Actions\ViewAction::make()
                    ->url(fn($record) => static::getUrl('view-basic-information', ['record' => $record]))
                    ->hidden(function ($record) {
                        return $record->status != StudyCaseStatus::Reviewed;
                    }),

                // study case can be edited only if reviewer has not reviewed it yet
                Tables\Actions\EditAction::make()
                    ->url(fn($record) => static::getUrl('edit-basic-information', ['record' => $record]))
                    ->hidden(function ($record) {
                        return $record->status == StudyCaseStatus::Reviewed;
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
            'manage-case-study-claims' => Pages\ManageCaseStudyClaims::route('/{record}/manage-case-study-claims'),
            'edit-communication-products' => Pages\EditCommunicationProducts::route('/{record}/edit-communication-products'),
            'edit-photos' => Pages\EditPhotos::route('/{record}/edit-photos'),
            'edit-confirmation' => Pages\EditConfirmation::route('/{record}/edit-confirmation'),

            'view' => Pages\ViewBasicInformation::route('/{record}'),
            'view-basic-information' => Pages\ViewBasicInformation::route('/{record}/view-basic-information'),
            'view-case-details' => Pages\ViewCaseDetails::route('/{record}/view-case-details'),
            'view-case-study-claims' => Pages\ViewCaseStudyClaims::route('/{record}/view-case-study-claims'),
            'view-communication-products' => Pages\ViewCommunicationProducts::route('/{record}/view-communication-products'),
            'view-photos' => Pages\ViewPhotos::route('/{record}/view-photos'),
            'view-confirmation' => Pages\ViewConfirmation::route('/{record}/view-confirmation'),
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
