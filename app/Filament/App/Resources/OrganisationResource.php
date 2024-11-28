<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Organisation;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\OrganisationResource\Pages;
use App\Filament\App\Resources\OrganisationResource\RelationManagers;

class OrganisationResource extends Resource
{
    protected static ?string $model = Organisation::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 13;

    // define translatable string in function
    public static function getModelLabel(): string
    {
        return t('Partner Organisation');
    }

    public static function getPluralModelLabel(): string
    {
        return t('Partner Organisations');
    }

    public static function getNavigationGroup(): string
    {
        return t('Definitions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(t('Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->label(t('Website'))
                    ->url()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Forms\Set $set, Forms\Get $get) {
                        static::trimUrlContent($set, $get, 'website');
                    }),
                Forms\Components\SpatieMediaLibraryFileUpload::make('logo')
                    ->label(t('Logo'))
                    ->hint(t('Please upload organisation logo image.'))
                    ->collection('logo')
                    ->downloadable()
                    ->preserveFilenames()
                    ->maxFiles(1)
                    ->maxSize(512000)
                    ->columnSpanFull()
                    ->image()
                    ->disk('s3'),
                Forms\Components\Textarea::make('note')
                    ->label(t('Note'))
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')->collection('logo'),
                Tables\Columns\TextColumn::make('name')
                    ->label(t('Name'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->label(t('Website'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->label(t('Note'))
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganisations::route('/'),
            'create' => Pages\CreateOrganisation::route('/create'),
            'edit' => Pages\EditOrganisation::route('/{record}/edit'),
        ];
    }

    protected static function trimUrlContent(Forms\Set $set, Forms\Get $get, string $fieldName): void
    {
        $fieldValue = $get($fieldName);

        if (! $fieldValue) {
            return;
        }

        $set($fieldName, Str::trim($fieldValue));
    }
}
