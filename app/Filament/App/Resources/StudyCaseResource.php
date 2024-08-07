<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use App\Models\Organisation;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\StudyCaseResource\Pages;
use App\Filament\App\Resources\StudyCaseResource\RelationManagers;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Case';

    protected static ?string $pluralModelLabel = 'Cases';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TODO, hide it, get and set team_id value before saving record
                Forms\Components\TextInput::make('team_id')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('leading_organisation_id')
                    ->label('Leading Organisation')
                    ->options(Organisation::all()->pluck('name', 'id'))
                    ->searchable(),

                Forms\Components\Textarea::make('statement')
                    ->label('Case statement')
                    ->hint('e.g., If __________ then __________')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('target_audience')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('call_to_action')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('target_audience_priorities_and_values')
                    ->label('Target audience\'s priorities and values')
                    ->hint('if you have more than one target audience/s, you can list them separately')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('framing')
                    ->label('Frameing of the case')
                    ->hint('based on your audience\'s priorities and way of understanding the issues at hand')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\RichEditor::make('strategy_to_argue')
                    ->label('Strategy to argue the case')
                    ->hint('e.g., is it a comparison? A value and rights-based argument?')
                    ->columnSpanFull()
                    ->disableToolbarButtons([
                        'attachFiles',
                        'strike',
                    ]),

                Forms\Components\Textarea::make('note')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('communicationProducts')
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->required(),
                        TextInput::make('url'),
                        // TODO: add file upload feature
                    ])
                    ->defaultItems(0)
                    ->addActionLabel('Add communication product')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('references')
                    ->relationship()
                    ->schema([
                        TextInput::make('description')->required(),
                        TextInput::make('url'),
                        // TODO: add file upload feature
                    ])
                    ->defaultItems(0)
                    ->addActionLabel('Add reference')
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
                Tables\Columns\TextColumn::make('statement')
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
