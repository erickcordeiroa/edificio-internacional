<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProperty extends EditRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Excluir Imóvel'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Editar Imóvel';
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

    protected function afterSave(): void
    {
        // Move qualquer imagem do diretório temp para o diretório do imóvel
        $property = $this->record;
        $photos = $property->photos;

        foreach ($photos as $photo) {
            $oldPath = $photo->url;
            
            // Se a imagem está no diretório temp, mova para o diretório do imóvel
            if (str_contains($oldPath, 'properties/temp/')) {
                $filename = basename($oldPath);
                $newPath = "properties/{$property->id}/{$filename}";
                
                if (Storage::disk('public')->exists($oldPath)) {
                    // Cria o diretório se não existir
                    Storage::disk('public')->makeDirectory("properties/{$property->id}");
                    
                    // Move o arquivo
                    Storage::disk('public')->move($oldPath, $newPath);
                    
                    // Atualiza o caminho no banco
                    $photo->update(['url' => $newPath]);
                }
            }
        }
    }
}
