<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use BackedEnum;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use UnitEnum;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = 'Imóveis';

    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return 'Imóvel';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Imóveis';
    }

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Gestão de Imóveis';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informações Básicas')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Dados do Imóvel')
                                    ->description('Preencha as informações principais do imóvel')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Título')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('Ex: Apartamento 3 quartos no Centro')
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Set $set, ?string $state) => 
                                                $set('slug', Str::slug($state ?? ''))
                                            ),
                                        
                                        TextInput::make('slug')
                                            ->label('Slug (URL)')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true)
                                            ->helperText('URL amigável gerada automaticamente'),
                                        
                                        RichEditor::make('description')
                                            ->label('Descrição')
                                            ->required()
                                            ->placeholder('Descreva o imóvel em detalhes...')
                                            ->toolbarButtons([
                                                'bold',
                                                'italic',
                                                'underline',
                                                'strike',
                                                'bulletList',
                                                'orderedList',
                                                'h2',
                                                'h3',
                                            ])
                                            ->columnSpanFull(),
                                        
                                        Select::make('type')
                                            ->label('Tipo de Transação')
                                            ->options([
                                                'SALE' => 'Venda',
                                                'RENT' => 'Aluguel',
                                            ])
                                            ->required()
                                            ->native(false)
                                            ->placeholder('Selecione o tipo'),
                                        
                                        TextInput::make('price')
                                            ->label('Preço')
                                            ->required()
                                            ->numeric()
                                            ->prefix('R$')
                                            ->placeholder('0,00')
                                            ->helperText('Valor do imóvel em reais'),
                                    ])
                                    ->columns(2),
                            ]),
                        
                        Tabs\Tab::make('Localização e Contato')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Section::make('Endereço')
                                    ->description('Informe a localização do imóvel')
                                    ->schema([
                                        Textarea::make('location')
                                            ->label('Localização/Endereço')
                                            ->required()
                                            ->rows(2)
                                            ->placeholder('Ex: Rua das Flores, 123 - Centro, São Paulo/SP')
                                            ->columnSpanFull(),
                                    ]),
                                
                                Section::make('Contato')
                                    ->description('Informações para contato')
                                    ->schema([
                                        TextInput::make('responsible_person')
                                            ->label('Pessoa Responsável')
                                            ->maxLength(255)
                                            ->placeholder('Nome do corretor/responsável'),
                                        
                                        TextInput::make('contact')
                                            ->label('Contato Principal')
                                            ->required()
                                            ->tel()
                                            ->maxLength(20)
                                            ->placeholder('(00) 00000-0000'),
                                        
                                        TextInput::make('whatsapp_contact')
                                            ->label('WhatsApp')
                                            ->tel()
                                            ->maxLength(20)
                                            ->placeholder('(00) 00000-0000'),
                                    ])
                                    ->columns(3),
                            ]),
                        
                        Tabs\Tab::make('Fotos')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make('Galeria de Fotos')
                                    ->description('Adicione as fotos do imóvel. A primeira foto marcada como principal será a capa.')
                                    ->schema([
                                        Repeater::make('photos')
                                            ->label('Fotos do Imóvel')
                                            ->relationship()
                                            ->schema([
                                                FileUpload::make('url')
                                                    ->label('Foto')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory(fn ($livewire) => 'properties/' . ($livewire->record?->id ?? 'temp'))
                                                    ->visibility('public')
                                                    ->imagePreviewHeight('200')
                                                    ->maxSize(10240)
                                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                                    ->helperText('Recomendado: imagens no formato 16:9 (ex: 1920x1080)')
                                                    ->required(),
                                                
                                                Toggle::make('is_featured')
                                                    ->label('Foto Principal')
                                                    ->default(false)
                                                    ->helperText('Marque para usar como capa'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->cloneable()
                                            ->reorderable()
                                            ->reorderableWithButtons()
                                            ->defaultItems(0)
                                            ->addActionLabel('Adicionar Foto')
                                            ->deleteAction(
                                                fn ($action) => $action->label('Remover')
                                            )
                                            ->itemLabel(fn (array $state): ?string => $state['is_featured'] ?? false ? '⭐ Foto Principal' : 'Foto'),
                                    ]),
                            ]),
                        
                        Tabs\Tab::make('Status')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Section::make('Configurações')
                                    ->description('Defina a visibilidade do imóvel no site')
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->label('Ativo')
                                            ->default(true)
                                            ->helperText('Imóveis inativos não aparecem no site'),
                                        
                                        Toggle::make('is_featured')
                                            ->label('Destaque')
                                            ->default(false)
                                            ->helperText('Imóveis em destaque aparecem na página inicial'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photos.url')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'SALE' => 'Venda',
                        'RENT' => 'Aluguel',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'SALE' => 'success',
                        'RENT' => 'info',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('location')
                    ->label('Localização')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('Preço')
                    ->formatStateUsing(fn ($state) => 'R$ ' . number_format($state, 2, ',', '.'))
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('contact')
                    ->label('Contato')
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Destaque')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Ativo')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipo')
                    ->options([
                        'SALE' => 'Venda',
                        'RENT' => 'Aluguel',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Ativo'),
                
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Destaque'),
            ])
            ->actions([
                Actions\ViewAction::make()
                    ->label('Ver'),
                Actions\EditAction::make()
                    ->label('Editar'),
                Actions\DeleteAction::make()
                    ->label('Excluir'),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make()
                        ->label('Excluir Selecionados'),
                ]),
            ])
            ->emptyStateHeading('Nenhum imóvel cadastrado')
            ->emptyStateDescription('Clique no botão abaixo para cadastrar seu primeiro imóvel')
            ->emptyStateIcon('heroicon-o-home-modern')
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
