<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use App\Models\Organisation;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\StudyCaseResource\Pages;
use App\Filament\App\Resources\StudyCaseResource\RelationManagers;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('team_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('leading_organisation_id')
                    ->label('Leading Organisation')
                    ->options(Organisation::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Textarea::make('statement')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('target_audience')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('call_to_action')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('target_audience_priorities_and_values')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('framing')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('strategy_to_argue')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leadingOrganisation.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListStudyCases::route('/'),
            'create' => Pages\CreateStudyCase::route('/create'),
            'edit' => Pages\EditStudyCase::route('/{record}/edit'),
        ];
    }
}
