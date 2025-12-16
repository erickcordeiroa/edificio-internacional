<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Apartamento de Luxo com Vista para o Mar',
                'description' => '<p>Lindo apartamento de alto padrão com vista deslumbrante para o mar. Acabamento premium.</p><p>Condomínio com infraestrutura completa: piscina, academia e segurança 24 horas.</p>',
                'location' => 'Av. Beira Mar, 1500 - Barra Sul, Balneário Camboriú - SC',
                'responsible_person' => 'João Silva',
                'contact' => '(47) 99999-0001',
                'whatsapp_contact' => '47999990001',
                'type' => 'SALE',
                'price' => 2500000.00,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Casa Moderna em Condomínio Fechado',
                'description' => '<p>Casa contemporânea em condomínio fechado com projeto arquitetônico diferenciado.</p><p>Destaque para a piscina com borda infinita e área gourmet completa.</p>',
                'location' => 'Rua das Palmeiras, 300 - Jardim Atlântico, Balneário Camboriú - SC',
                'responsible_person' => 'Maria Santos',
                'contact' => '(47) 99999-0002',
                'whatsapp_contact' => '47999990002',
                'type' => 'SALE',
                'price' => 3800000.00,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Apartamento para Aluguel - Centro',
                'description' => '<p>Apartamento bem localizado no centro da cidade. Próximo a supermercados, farmácias e transporte.</p>',
                'location' => 'Rua Central, 500 - Centro, Itajaí - SC',
                'responsible_person' => 'Carlos Oliveira',
                'contact' => '(47) 99999-0003',
                'whatsapp_contact' => '47999990003',
                'type' => 'RENT',
                'price' => 2500.00,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Sala Comercial no Centro Empresarial',
                'description' => '<p>Sala comercial em edifício empresarial de alto padrão. Ideal para escritórios e consultórios.</p>',
                'location' => 'Av. Brasil, 2000 - Centro Empresarial Tower, Balneário Camboriú - SC',
                'responsible_person' => 'Ana Paula',
                'contact' => '(47) 99999-0004',
                'whatsapp_contact' => '47999990004',
                'type' => 'RENT',
                'price' => 4500.00,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Cobertura Duplex com Piscina Privativa',
                'description' => '<p>Espetacular cobertura duplex com piscina privativa e vista panorâmica.</p><p>Terraço com área gourmet completa.</p>',
                'location' => 'Av. Atlântica, 800 - Ed. Golden Tower, Balneário Camboriú - SC',
                'responsible_person' => 'Roberto Mendes',
                'contact' => '(47) 99999-0005',
                'whatsapp_contact' => '47999990005',
                'type' => 'SALE',
                'price' => 6500000.00,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($properties as $propertyData) {
            $propertyData['slug'] = Str::slug($propertyData['title']);
            
            // Check if property already exists
            $existingProperty = Property::where('slug', $propertyData['slug'])->first();
            if (!$existingProperty) {
                Property::create($propertyData);
            }
        }
    }
}
