<?php

namespace App\Filament\Resources\FractionResource\Pages;

use App\Filament\Resources\FractionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFraction extends CreateRecord
{
    protected static string $resource = FractionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Cadastrar Fração';
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Salvar Fração');
    }

    protected function getCreateAnotherFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Salvar e Criar Outra');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Cancelar');
    }
}
