# 🏢 Edifício Internacional

Sistema web para o **Edifício Internacional**, desenvolvido com Laravel 12 e Filament 4. Uma plataforma completa para gerenciamento e exibição de imóveis para venda e aluguel, além de um simulador de frações de condomínio.

![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-4.3-FDAE4B?style=flat-square&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white)

## ✨ Funcionalidades

### 🌐 Site Público
- **Página Inicial** - Apresentação da imobiliária com imóveis em destaque e recentes
- **Listagem de Imóveis** - Busca e filtros por tipo (venda/aluguel)
- **Detalhes do Imóvel** - Galeria de fotos, descrição, localização e contato via WhatsApp
- **Simulador de Condomínio** - Calculadora de frações para estimativa de valores de condomínio
- **Página Sobre** - História e informações da empresa
- **Página de Contato** - Formulário e informações de contato

### 🔧 Painel Administrativo (Filament)
- **Gerenciamento de Imóveis** - CRUD completo com upload de fotos
- **Gerenciamento de Frações** - Cadastro de frações ideais do condomínio
- **Gerenciamento de Usuários** - Controle de acesso ao painel

## 🛠️ Tecnologias

- **Backend:** PHP 8.2+, Laravel 12
- **Admin Panel:** Filament 4.3
- **Frontend:** Blade, TailwindCSS, Vite
- **Banco de Dados:** SQLite (padrão) / MySQL / PostgreSQL
- **Testes:** PHPUnit

## 📋 Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js 18+ e NPM
- SQLite / MySQL / PostgreSQL

## 🚀 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/new-edificio.git
cd new-edificio
```

### 2. Instalação automática

O projeto possui um script de setup que configura tudo automaticamente:

```bash
composer setup
```

Este comando irá:
- Instalar dependências PHP
- Copiar `.env.example` para `.env`
- Gerar a chave da aplicação
- Executar as migrations
- Instalar dependências Node.js
- Compilar os assets

### 3. Instalação manual (alternativa)

```bash
# Instalar dependências PHP
composer install

# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate

# Criar banco de dados SQLite
touch database/database.sqlite

# Executar migrations
php artisan migrate

# (Opcional) Popular banco com dados de exemplo
php artisan db:seed

# Instalar dependências Node.js
npm install

# Compilar assets
npm run build
```

### 4. Criar usuário administrador

```bash
php artisan make:filament-user
```

## 💻 Desenvolvimento

Para iniciar o ambiente de desenvolvimento com hot-reload:

```bash
composer dev
```

Este comando inicia simultaneamente:
- 🌐 Servidor Laravel (`php artisan serve`)
- 📋 Queue listener
- 📝 Logs em tempo real (Pail)
- ⚡ Vite dev server

Ou manualmente:

```bash
# Terminal 1 - Servidor
php artisan serve

# Terminal 2 - Vite
npm run dev
```

## 📁 Estrutura do Projeto

```
├── app/
│   ├── Filament/           # Resources do painel admin
│   │   └── Resources/
│   │       ├── FractionResource.php
│   │       ├── PropertyResource.php
│   │       └── UserResource.php
│   ├── Http/Controllers/   # Controllers do site
│   │   ├── FractionController.php
│   │   ├── HomeController.php
│   │   └── PropertyController.php
│   └── Models/             # Eloquent Models
│       ├── Fraction.php
│       ├── Photo.php
│       ├── Property.php
│       └── User.php
├── database/
│   ├── migrations/         # Migrations do banco
│   └── seeders/            # Seeders para dados de exemplo
├── resources/
│   └── views/              # Templates Blade
│       ├── components/
│       ├── fractions/
│       ├── layouts/
│       └── properties/
├── routes/
│   └── web.php             # Rotas do site
└── public/
    └── img/                # Imagens estáticas
```

## 🗂️ Models

### Property (Imóvel)
| Campo | Tipo | Descrição |
|-------|------|-----------|
| title | string | Título do imóvel |
| slug | string | URL amigável |
| description | text | Descrição detalhada |
| location | string | Localização |
| responsible_person | string | Pessoa responsável |
| contact | string | Telefone de contato |
| whatsapp_contact | string | WhatsApp para contato |
| type | enum | SALE (venda) ou RENT (aluguel) |
| price | decimal | Valor do imóvel |
| is_featured | boolean | Imóvel em destaque |
| is_active | boolean | Imóvel ativo |

### Fraction (Fração)
| Campo | Tipo | Descrição |
|-------|------|-----------|
| location | string | Identificação (ex: Apt 101) |
| fraction | decimal | Fração ideal (0.000000 a 1.000000) |
| type | enum | apartment, store, garage, office, storage |

## 🌐 Rotas

| Método | URI | Nome | Descrição |
|--------|-----|------|-----------|
| GET | `/` | home | Página inicial |
| GET | `/sobre` | about | Sobre a empresa |
| GET | `/contato` | contact | Página de contato |
| GET | `/imoveis` | properties.index | Lista de imóveis |
| GET | `/imovel/{slug}` | properties.show | Detalhes do imóvel |
| GET | `/fracoes` | fractions.simulator | Simulador de condomínio |
| POST | `/fracoes/calcular` | fractions.calculate | Calcular fração |
| POST | `/fracoes/buscar` | fractions.find | Buscar fração |

## 🔐 Painel Administrativo

Acesse o painel em: `http://localhost:8000/admin`

## 🧪 Testes

```bash
# Executar todos os testes
composer test

# Ou diretamente
php artisan test
```

## 📝 Scripts Disponíveis

| Comando | Descrição |
|---------|-----------|
| `composer setup` | Instalação completa do projeto |
| `composer dev` | Inicia ambiente de desenvolvimento |
| `composer test` | Executa os testes |
| `npm run dev` | Inicia Vite em modo desenvolvimento |
| `npm run build` | Compila assets para produção |

## 🤝 Contribuindo

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Desenvolvido com ❤️ para **Edifício Internacional**
