@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/painel-visual.png') }}" alt="" class="w-full h-full object-cover object-center">
        </div>
        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/80 to-transparent"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl">
                <!-- Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-block px-4 py-2 bg-royal-100 text-royal-700 rounded-full text-sm font-medium mb-6 animate-fade-in-up">
                        🏠 Há mais de 20 anos no mercado
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-800 leading-tight animate-fade-in-up" style="animation-delay: 0.1s">
                        <span class="font-display italic text-royal-600">Edifício</span>
                        <br>
                        <span class="gradient-text">Internacional</span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 mt-6 max-w-lg mx-auto lg:mx-0 animate-fade-in-up" style="animation-delay: 0.2s">
                        Encontre o imóvel perfeito para você e sua família. Oferecemos as melhores opções de casas, apartamentos e terrenos para venda e aluguel.
                    </p>

                    <!-- Stats -->
                    <div class="flex flex-wrap justify-center lg:justify-start gap-8 mt-8 animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-royal-600">{{ $propertiesForSale }}</div>
                            <div class="text-sm text-slate-500">Imóveis à Venda</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-royal-600">{{ $propertiesForRent }}</div>
                            <div class="text-sm text-slate-500">Para Aluguel</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-royal-600">500+</div>
                            <div class="text-sm text-slate-500">Clientes Felizes</div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col lg:inline-flex w-full lg:w-auto mt-10 animate-fade-in-up" style="animation-delay: 0.4s">
                        <div class="flex flex-col lg:flex-row gap-4">
                            <a href="{{ route('properties.index', ['transaction' => 'sale']) }}" class="btn-primary w-full lg:w-auto justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Comprar Imóvel
                            </a>
                            <a href="{{ route('properties.index', ['transaction' => 'rent']) }}" class="btn-secondary w-full lg:w-auto justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Alugar Imóvel
                            </a>
                        </div>
                        <a href="{{ route('fractions.simulator') }}" class="flex items-center justify-center gap-2 bg-green-500 text-white py-3 rounded-md font-semibold hover:bg-green-600 transition-all shadow-lg mt-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            Simule seu condomínio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured Properties -->
    @if($featuredProperties->count() > 0)
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-title">Imóveis em <span class="gradient-text">Destaque</span></h2>
                <p class="section-subtitle">Os melhores imóveis selecionados especialmente para você</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProperties as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('properties.index') }}" class="btn-secondary">
                    Ver Todos os Imóveis
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Properties -->
    @if($latestProperties->count() > 0)
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-title">Imóveis <span class="gradient-text">Recentes</span></h2>
                <p class="section-subtitle">Confira as últimas opções disponíveis</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($latestProperties as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    <section class="py-20 bg-gradient-to-br from-royal-800 via-royal-900 to-slate-900 text-white relative overflow-hidden">
        <!-- Decorative -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-royal-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold">Por que escolher a <span class="text-sky-400">Edifício Internacional</span>?</h2>
                <p class="text-slate-300 mt-3 max-w-2xl mx-auto">Confiança e excelência em cada negociação</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-white/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-500/20 transition-all">
                        <svg class="w-10 h-10 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Segurança</h3>
                    <p class="text-slate-400">Toda documentação verificada e processos transparentes</p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-white/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-500/20 transition-all">
                        <svg class="w-10 h-10 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Atendimento</h3>
                    <p class="text-slate-400">Equipe especializada pronta para atender suas necessidades</p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-white/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-500/20 transition-all">
                        <svg class="w-10 h-10 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Variedade</h3>
                    <p class="text-slate-400">Ampla seleção de imóveis para todos os perfis</p>
                </div>

                <!-- Feature 4 -->
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-white/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-500/20 transition-all">
                        <svg class="w-10 h-10 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Melhor Preço</h3>
                    <p class="text-slate-400">Negociamos as melhores condições para você</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Preview -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image -->
                <div class="relative">
                    <div class="rounded-3xl overflow-hidden shadow-xl">
                        <img src="{{ asset('img/painel-visual.png') }}" alt="Edifício Internacional" class="w-full h-auto object-cover">
                    </div>
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -right-6 bg-royal-600 text-white p-6 rounded-2xl shadow-xl">
                        <div class="text-4xl font-bold">20+</div>
                        <div class="text-sm text-royal-200">Anos de experiência</div>
                    </div>
                </div>

                <!-- Content -->
                <div>
                    <div class="inline-block px-4 py-2 bg-royal-100 text-royal-700 rounded-full text-sm font-medium mb-6">
                        Sobre Nós
                    </div>
                    <h2 class="section-title">Sua nova história <span class="gradient-text">começa aqui</span></h2>
                    <p class="text-slate-600 mt-6 leading-relaxed">
                        A Edifício Internacional é uma imobiliária consolidada no mercado há mais de duas décadas. 
                        Nossa missão é transformar o sonho da casa própria em realidade, oferecendo um atendimento 
                        personalizado e imóveis de qualidade.
                    </p>
                    <p class="text-slate-600 mt-4 leading-relaxed">
                        Contamos com uma equipe de profissionais altamente qualificados, prontos para orientar você 
                        em todas as etapas da compra, venda ou locação do seu imóvel.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-8">
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Atendimento personalizado
                        </div>
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Documentação completa
                        </div>
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Consultoria jurídica
                        </div>
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Financiamento facilitado
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="btn-primary mt-8">
                        Conheça nossa história
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-royal-600 to-royal-700 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
                <rect width="100" height="100" fill="url(#grid)"/>
            </svg>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Pronto para encontrar seu imóvel ideal?
                </h2>
                <p class="text-royal-100 text-lg mb-8">
                    Entre em contato conosco e deixe nossa equipe ajudar você a realizar seu sonho.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-white text-royal-600 px-8 py-4 rounded-full font-semibold hover:bg-royal-50 transition-all shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Ver Imóveis
                    </a>
                    <a href="https://wa.me/5500000000000" target="_blank" class="inline-flex items-center gap-2 bg-green-500 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-600 transition-all shadow-lg">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Falar no WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

