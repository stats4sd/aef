<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ClaimResource\Pages;
use App\Filament\Admin\Resources\ClaimResource\RelationManagers;
use App\Models\Claim;
use App\Filament\App\Resources\ClaimResource as AppPanelClaimResource;
use App\Filament\App\Resources\ClaimResource\RelationManagers\EvidencesRelationManager as AppPanelEvidencesRelationManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClaimResource extends Resource
{
    protected static ?string $model = Claim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // do not show Claims resource in side bar
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return AppPanelClaimResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return AppPanelClaimResource::table($table);
    }

    public static function getRelations(): array
    {
        return [
            AppPanelEvidencesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClaims::route('/'),
            'create' => Pages\CreateClaim::route('/create'),
            'edit' => Pages\EditClaim::route('/{record}/edit'),
        ];
    }
}
