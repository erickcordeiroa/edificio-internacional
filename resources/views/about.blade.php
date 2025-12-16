@extends('layouts.app')

@section('title', 'Sobre Nós')
@section('meta_description', 'Conheça a Edifício Internacional - mais de 20 anos de experiência no mercado imobiliário')

@section('content')
    <!-- Header -->
    <section class="bg-gradient-to-br from-royal-800 via-royal-900 to-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-royal-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-block px-4 py-2 bg-white/10 text-white rounded-full text-sm font-medium mb-6">
                    Nossa História
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Sobre a <span class="text-sky-400">Edifício Internacional</span>
                </h1>
                <p class="text-slate-300 text-lg">
                    Há mais de duas décadas transformando sonhos em endereços
                </p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image -->
                <div class="relative">
                    <div class="aspect-[4/3] bg-gradient-to-br from-royal-100 to-sky-100 rounded-3xl overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-32 h-32 text-royal-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                    </div>
                    <!-- Floating Stats -->
                    <div class="absolute -bottom-8 -right-8 bg-royal-600 text-white p-8 rounded-2xl shadow-2xl">
                        <div class="text-5xl font-bold mb-2">20+</div>
                        <div class="text-royal-200">Anos de experiência</div>
                    </div>
                    <div class="absolute -top-8 -left-8 bg-white p-6 rounded-2xl shadow-xl">
                        <div class="text-4xl font-bold text-royal-600 mb-1">500+</div>
                        <div class="text-slate-500 text-sm">Clientes satisfeitos</div>
                    </div>
                </div>

                <!-- Content -->
                <div>
                    <h2 class="section-title mb-6">Quem <span class="gradient-text">Somos</span></h2>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        A Edifício Internacional nasceu há mais de 20 anos com uma missão clara: transformar o sonho da casa 
                        própria em realidade. Desde então, nos tornamos referência no mercado imobiliário, construindo 
                        relacionamentos sólidos baseados em confiança, transparência e excelência no atendimento.
                    </p>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        Nossa equipe é formada por profissionais altamente qualificados e apaixonados pelo que fazem. 
                        Cada membro da nossa família está comprometido em oferecer a melhor experiência possível, 
                        desde a primeira consulta até a entrega das chaves.
                    </p>
                    <p class="text-slate-600 mb-8 leading-relaxed">
                        Trabalhamos com uma ampla variedade de imóveis: casas, apartamentos, terrenos, imóveis comerciais 
                        e rurais. Seja para comprar, vender ou alugar, você pode contar conosco em cada etapa do processo.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800">Transparência</h4>
                                <p class="text-sm text-slate-500">Em todas as negociações</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800">Compromisso</h4>
                                <p class="text-sm text-slate-500">Com seus objetivos</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800">Qualidade</h4>
                                <p class="text-sm text-slate-500">Em cada detalhe</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800">Atendimento</h4>
                                <p class="text-sm text-slate-500">Personalizado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-royal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Missão</h3>
                    <p class="text-slate-600">
                        Proporcionar a melhor experiência imobiliária, conectando pessoas aos seus imóveis ideais com 
                        transparência, agilidade e profissionalismo.
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-royal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Visão</h3>
                    <p class="text-slate-600">
                        Ser reconhecida como a imobiliária mais confiável e inovadora da região, referência em excelência 
                        e satisfação do cliente.
                    </p>
                </div>

                <!-- Values -->
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="w-16 h-16 bg-royal-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Valores</h3>
                    <p class="text-slate-600">
                        Ética, honestidade, respeito, comprometimento, inovação e foco total na satisfação do cliente 
                        em cada negociação.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
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
                    Vamos realizar seu sonho juntos?
                </h2>
                <p class="text-royal-100 text-lg mb-8">
                    Entre em contato conosco e descubra como podemos ajudar você.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white text-royal-600 px-8 py-4 rounded-full font-semibold hover:bg-royal-50 transition-all shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Fale Conosco
                    </a>
                    <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 bg-white/10 text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Ver Imóveis
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

