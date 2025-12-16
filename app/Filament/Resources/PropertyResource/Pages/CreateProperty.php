<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Models\Photo;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'Cadastrar Imóvel';
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Salvar Imóvel');
    }

    protected function getCreateAnotherFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Salvar e Criar Outro');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Cancelar');
    }

    protected function afterCreate(): void
    {
        // Move as imagens do diretório temporário para o diretório do imóvel
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
