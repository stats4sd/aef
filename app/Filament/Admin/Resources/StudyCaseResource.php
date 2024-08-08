<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\StudyCase;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\StudyCaseResource\Pages;
use App\Filament\Admin\Resources\StudyCaseResource\RelationManagers;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // TODO, disable all columns as reviewer should not be able to modify case content
        // reviewer can contact submitter to update case content offline (e.g. by email)

        return $form
            ->schema([
                // TODO, hide it, get and set team_id value before saving record
                Forms\Components\Select::make('team_id')
                    ->relationship('team', 'name')
                    ->required(),
                Forms\Components\Select::make('leading_organisation_id')
                    ->relationship('leadingOrganisation', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('year_of_development')
                    ->numeric(),
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
                Forms\Components\Checkbox::make('ready_for_review')
                    ->label('I confirm that all content are correct. This case is now ready for review.')
                    ->columnSpanFull(),
                Forms\Components\Checkbox::make('reviewed')
                    ->label('I confirm that all content has been reviewed. This case is now ready for publishing.')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('leadingOrganisation.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statement')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('ready_for_review')
                    ->boolean(),
                Tables\Columns\IconColumn::make('reviewed')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('ready_for_review'),
                TernaryFilter::make('reviewed'),
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
