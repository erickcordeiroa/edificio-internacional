<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FractionResource\Pages;
use App\Models\Fraction;
use BackedEnum;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class FractionResource extends Resource
{
    protected static ?string $model = Fraction::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-chart-pie';

    protected static ?string $navigationLabel = 'Frações';

    protected static ?int $navigationSort = 5;

    public static function getModelLabel(): string
    {
        return 'Fração';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Frações';
    }

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Condomínio';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados da Fração')
                    ->description('Preencha as informações da fração ideal')
                    ->schema([
                        TextInput::make('location')
                            ->label('Localização/Unidade')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: Apt 101, Loja 01, Garagem 05'),
                        
                        Select::make('type')
                            ->label('Tipo')
                            ->options([
                                'apartment' => 'Apartamento',
                                'store' => 'Loja',
                                'garage' => 'Garagem',
                                'office' => 'Sala Comercial',
                                'storage' => 'Depósito',
                            ])
                            ->required()
                            ->native(false)
                            ->placeholder('Selecione o tipo'),
                        
                        TextInput::make('fraction')
                            ->label('Fração Ideal')
                            ->required()
                            ->numeric()
                            ->step(0.000001)
                            ->placeholder('Ex: 0.025000')
                            ->helperText('Valor decimal da fração (ex: 0.025000 = 2,5%)'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('location')
                    ->label('Localização')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'apartment' => 'Apartamento',
                        'store' => 'Loja',
                        'garage' => 'Garagem',
                        'office' => 'Sala Comercial',
                        'storage' => 'Depósito',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'apartment' => 'info',
                        'store' => 'success',
                        'garage' => 'gray',
                        'office' => 'warning',
                        'storage' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('fraction')
                    ->label('Fração')
                    ->formatStateUsing(fn ($state) => number_format($state, 6, ',', '.'))
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('percentage')
                    ->label('Percentual')
                    ->formatStateUsing(fn ($record) => number_format($record->fraction * 100, 4, ',', '.') . '%')
                    ->sortable(),
                
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
                        'apartment' => 'Apartamento',
                        'store' => 'Loja',
                        'garage' => 'Garagem',
                        'office' => 'Sala Comercial',
                        'storage' => 'Depósito',
                    ]),
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
            ->emptyStateHeading('Nenhuma fração cadastrada')
            ->emptyStateDescription('Clique no botão abaixo para cadastrar uma nova fração')
            ->emptyStateIcon('heroicon-o-chart-pie')
            ->defaultSort('location', 'asc');
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
            'index' => Pages\ListFractions::route('/'),
            'create' => Pages\CreateFraction::route('/create'),
            'edit' => Pages\EditFraction::route('/{record}/edit'),
        ];
    }
}
