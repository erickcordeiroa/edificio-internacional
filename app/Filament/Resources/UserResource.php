<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use BackedEnum;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Usuários';

    protected static ?int $navigationSort = 10;

    public static function getModelLabel(): string
    {
        return 'Usuário';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Usuários';
    }

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Configurações';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dados do Usuário')
                    ->description('Preencha as informações do usuário')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nome completo'),
                        
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('email@exemplo.com'),
                        
                        TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(6)
                            ->helperText('Deixe em branco para manter a senha atual'),
                        
                        Select::make('role')
                            ->label('Função')
                            ->options([
                                'admin' => 'Administrador',
                                'manager' => 'Gerente',
                                'user' => 'Usuário',
                            ])
                            ->required()
                            ->native(false)
                            ->default('user')
                            ->placeholder('Selecione a função'),
                        
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Ativo',
                                'inactive' => 'Inativo',
                                'blocked' => 'Bloqueado',
                            ])
                            ->required()
                            ->native(false)
                            ->default('active')
                            ->placeholder('Selecione o status'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('role')
                    ->label('Função')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'admin' => 'Administrador',
                        'manager' => 'Gerente',
                        'user' => 'Usuário',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'manager' => 'warning',
                        'user' => 'info',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'active' => 'Ativo',
                        'inactive' => 'Inativo',
                        'blocked' => 'Bloqueado',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'gray',
                        'blocked' => 'danger',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Função')
                    ->options([
                        'admin' => 'Administrador',
                        'manager' => 'Gerente',
                        'user' => 'Usuário',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Ativo',
                        'inactive' => 'Inativo',
                        'blocked' => 'Bloqueado',
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
            ->emptyStateHeading('Nenhum usuário cadastrado')
            ->emptyStateDescription('Clique no botão abaixo para cadastrar um novo usuário')
            ->emptyStateIcon('heroicon-o-users')
            ->defaultSort('name', 'asc');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
