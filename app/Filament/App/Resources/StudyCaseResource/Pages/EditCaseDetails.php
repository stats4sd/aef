<?php

namespace App\Filament\App\Resources\StudyCaseResource\Pages;

use App\Filament\App\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;


class EditCaseDetails extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    public static function getNavigationLabel(): string
    {
        return t('Case Details');
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-bars-3-center-left';
    }

    public function getSubheading(): ?string
    {
        return __(t('Please fill in details in all tabs, then create claims and evidence of your case'));
    }

    protected function getHeaderActions(): array
    {
        return [
            // TODO: support multiple languages
            Actions\Action::make('Save')->action('save')->label('Save changes'),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Case Details')
                ->schema([
                    RichEditor::make('statement')
                        ->label(t('Statement(s)'))
                        ->hint(t('e.g., If __________ then __________'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),

                    RichEditor::make('target_audience')
                        ->label(t('Description of the target audience(s)'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),

                    RichEditor::make('target_audience_priorities_and_values')
                        ->label(t('Target audience(s)\'s priorities and values'))
                        ->hint(t('if you have more than one target audience/s, you can list them separately'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),

                    RichEditor::make('framing')
                        ->label(t('Framing(s) of the case'))
                        ->hint(t('based on your audience\'s priorities and way of understanding the issues at hand'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),

                    RichEditor::make('strategy_to_argue')
                        ->label(t('Description of the strategy(ies) to argue the case'))
                        ->hint(t('e.g., is it a comparison? A value and rights-based argument?'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),

                    RichEditor::make('call_to_action')
                        ->label(t('Call to action(s)'))
                        ->extraInputAttributes(['style' => 'height: 300px; overflow: scroll'])
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'bulletList',
                            'orderedList',
                            'undo',
                            'redo',
                        ]),
                ]),
        ]);
    }
}
