@extends('layouts.app')

@section('title', 'Contato')
@section('meta_description', 'Entre em contato com a Edifício Internacional - Estamos prontos para ajudar você a encontrar o imóvel ideal')

@section('content')
    <!-- Header -->
    <section class="py-20 relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/painel-visual.png') }}" alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-royal-900/90 via-royal-800/85 to-slate-900/90"></div>
        </div>
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-royal-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-block px-4 py-2 bg-white/10 text-white rounded-full text-sm font-medium mb-6">
                    Fale Conosco
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Entre em <span class="text-sky-400">Contato</span>
                </h1>
                <p class="text-slate-300 text-lg">
                    Estamos prontos para ajudar você a encontrar o imóvel perfeito
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Contact Info -->
                <div>
                    <h2 class="section-title mb-8">Informações de <span class="gradient-text">Contato</span></h2>
                    
                    <div class="space-y-6 mb-10">
                        <!-- Address 1 -->
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl">
                            <div class="w-12 h-12 bg-royal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-1">Endereço - São Vicente</h4>
                                <p class="text-slate-600">Av. Manoel da Nobrega, 1.835 - Itararé</p>
                                <p class="text-slate-600">São Vicente, São Paulo - CEP 11320-931</p>
                            </div>
                        </div>

                        <!-- Address 2 -->
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl">
                            <div class="w-12 h-12 bg-royal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-1">Endereço - Santos</h4>
                                <p class="text-slate-600">Rua Pedro Borges Gonçalves, 06 - José Menino</p>
                                <p class="text-slate-600">Santos, São Paulo - CEP 11065-300</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl">
                            <div class="w-12 h-12 bg-royal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-1">Telefone</h4>
                                <a href="tel:1334685729" class="text-royal-600 hover:text-royal-700">(13) 3468-5729</a>
                                <p class="text-sm text-slate-500 mt-1">Seg a Sex, 8h às 18h</p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-1">WhatsApp</h4>
                                <a href="https://wa.me/5513996304781" target="_blank" class="text-green-600 hover:text-green-700">(13) 99630-4781</a>
                                <p class="text-sm text-slate-500 mt-1">Atendimento rápido</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl">
                            <div class="w-12 h-12 bg-royal-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-1">Email</h4>
                                <a href="mailto:portaria@edificiointernacional.com.br" class="text-royal-600 hover:text-royal-700">portaria@edificiointernacional.com.br</a>
                                <p class="text-sm text-slate-500 mt-1">Resposta em até 24h</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <div class="bg-slate-50 rounded-2xl p-8">
                        <h3 class="text-2xl font-semibold text-slate-800 mb-6">Envie sua mensagem</h3>
                        
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nome completo *</label>
                                    <input type="text" id="name" name="name" required class="form-input">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Telefone *</label>
                                    <input type="tel" id="phone" name="phone" required class="form-input">
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                                <input type="email" id="email" name="email" required class="form-input">
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Assunto</label>
                                <select id="subject" name="subject" class="form-select">
                                    <option value="">Selecione um assunto</option>
                                    <option value="comprar">Quero comprar um imóvel</option>
                                    <option value="alugar">Quero alugar um imóvel</option>
                                    <option value="vender">Quero vender/anunciar um imóvel</option>
                                    <option value="visita">Agendar visita</option>
                                    <option value="duvida">Dúvida geral</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Mensagem *</label>
                                <textarea id="message" name="message" rows="5" required class="form-input resize-none" placeholder="Como podemos ajudar?"></textarea>
                            </div>

                            <button type="submit" class="btn-primary w-full justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="h-96 bg-slate-200">
        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
            <div class="text-center">
                <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <p class="text-slate-500">Mapa será exibido aqui</p>
                <p class="text-sm text-slate-400 mt-2">Integre com Google Maps ou OpenStreetMap</p>
            </div>
        </div>
    </section>
@endsection

