<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CountryResource\Pages;
use App\Filament\Admin\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';

    protected static ?int $navigationSort = 11;

    // define translatable string in function
    public static function getModelLabel(): string
    {
        return t('Country');
    }

    public static function getPluralModelLabel(): string
    {
        return t('Countries');
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
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('iso_alpha3')
                    ->label('Iso alpha3')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('region_id')
                    ->label('Region id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('iso_alpha2')
                    ->label('Iso alpha3')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('iso_alpha3')
                    ->label('Iso alpha3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region_id')
                    ->label('Region id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('iso_alpha2')
                    ->label('Iso alpha2')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCountries::route('/'),
            // 'create' => Pages\CreateCountry::route('/create'),
            // 'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
