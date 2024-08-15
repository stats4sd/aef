<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\OrganisationResource\Pages;
use App\Filament\App\Resources\OrganisationResource\RelationManagers;
use App\Models\Organisation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganisationResource extends Resource
{
    protected static ?string $model = Organisation::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
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
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_person_name')
                    ->label(t('Contact person name'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_person_email')
                    ->label(t('Contact person email'))
                    ->email()
                    ->maxLength(255),
                Forms\Components\Textarea::make('note')
                    ->label(t('Note'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(t('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->label(t('Website'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_name')
                    ->label(t('Contact person name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_email')
                    ->label(t('Contact person email'))
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
}
