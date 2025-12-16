<?php

namespace App\Filament\Resources\FractionResource\Pages;

use App\Filament\Resources\FractionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFraction extends EditRecord
{
    protected static string $resource = FractionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Excluir Fração'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Editar Fração';
    }

    protected function getSaveFormAction(): \Filament\Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Salvar Alterações');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Cancelar');
    }
}
