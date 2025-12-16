<?php

namespace App\Filament\Resources\FractionResource\Pages;

use App\Filament\Resources\FractionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFractions extends ListRecords
{
    protected static string $resource = FractionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Nova Fração')
                ->icon('heroicon-o-plus'),
        ];
    }

    public function getTitle(): string
    {
        return 'Frações';
    }
}
