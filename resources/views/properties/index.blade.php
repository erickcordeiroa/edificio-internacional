@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <!-- Header -->
    <section class="bg-gradient-to-br from-royal-800 via-royal-900 to-slate-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-royal-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                    Nossos <span class="text-sky-400">Imóveis</span>
                </h1>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                    Encontre o imóvel perfeito para você. Filtre por suas preferências e descubra as melhores opções.
                </p>
            </div>
        </div>
    </section>

    <!-- Filters -->
    <section class="py-8 bg-white shadow-sm sticky top-[72px] z-40">
        <div class="container mx-auto px-4">
            <form action="{{ route('properties.index') }}" method="GET" id="filter-form">
                <div class="flex flex-wrap gap-4 items-end">
                    <div class="flex-1 min-w-[150px]">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Transação</label>
                        <select name="transaction" class="form-select text-sm" onchange="document.getElementById('filter-form').submit()">
                            <option value="">Todos</option>
                            <option value="sale" {{ request('transaction') === 'sale' ? 'selected' : '' }}>Comprar</option>
                            <option value="rent" {{ request('transaction') === 'rent' ? 'selected' : '' }}>Alugar</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[150px]">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Tipo</label>
                        <select name="type" class="form-select text-sm" onchange="document.getElementById('filter-form').submit()">
                            <option value="">Todos</option>
                            <option value="house" {{ request('type') === 'house' ? 'selected' : '' }}>Casa</option>
                            <option value="apartment" {{ request('type') === 'apartment' ? 'selected' : '' }}>Apartamento</option>
                            <option value="commercial" {{ request('type') === 'commercial' ? 'selected' : '' }}>Comercial</option>
                            <option value="land" {{ request('type') === 'land' ? 'selected' : '' }}>Terreno</option>
                            <option value="farm" {{ request('type') === 'farm' ? 'selected' : '' }}>Fazenda/Sítio</option>
                        </select>
                    </div>
                    <div class="flex-1 min-w-[150px]">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Cidade</label>
                        <input type="text" name="city" value="{{ request('city') }}" placeholder="Digite a cidade" class="form-input text-sm">
                    </div>
                    <div class="flex-1 min-w-[120px]">
                        <label class="block text-xs font-medium text-slate-500 mb-1">Quartos</label>
                        <select name="bedrooms" class="form-select text-sm" onchange="document.getElementById('filter-form').submit()">
                            <option value="">Todos</option>
                            <option value="1" {{ request('bedrooms') === '1' ? 'selected' : '' }}>1+</option>
                            <option value="2" {{ request('bedrooms') === '2' ? 'selected' : '' }}>2+</option>
                            <option value="3" {{ request('bedrooms') === '3' ? 'selected' : '' }}>3+</option>
                            <option value="4" {{ request('bedrooms') === '4' ? 'selected' : '' }}>4+</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="btn-primary text-sm py-2.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Buscar
                        </button>
                        @if(request()->hasAny(['transaction', 'type', 'city', 'bedrooms', 'min_price', 'max_price']))
                            <a href="{{ route('properties.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-sm text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors">
                                Limpar
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Properties Grid -->
    <section class="py-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <!-- Results Info -->
            <div class="flex items-center justify-between mb-8">
                <p class="text-slate-600">
                    <span class="font-semibold text-slate-800">{{ $properties->total() }}</span> imóveis encontrados
                </p>
            </div>

            @if($properties->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($properties as $property)
                        @include('components.property-card', ['property' => $property])
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($properties->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $properties->withQueryString()->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-20">
                    <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-700 mb-2">Nenhum imóvel encontrado</h3>
                    <p class="text-slate-500 mb-6">Tente ajustar os filtros para encontrar mais opções.</p>
                    <a href="{{ route('properties.index') }}" class="btn-primary">
                        Ver todos os imóveis
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

