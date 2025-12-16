<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Edifício Internacional - Imóveis de qualidade para venda e aluguel')">
    <title>@yield('title', 'Edifício Internacional') | Imobiliária</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-slate-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group">
                    <img src="{{ asset('img/new-logo.png') }}" alt="Edifício Internacional" class="h-14 w-auto group-hover:opacity-90 transition-opacity">
                </a>

                <!-- Navigation Desktop -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors {{ request()->routeIs('home') ? 'text-royal-600' : '' }}">
                        Início
                    </a>
                    <a href="{{ route('properties.index', ['transaction' => 'SALE']) }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors">
                        Comprar
                    </a>
                    <a href="{{ route('properties.index', ['transaction' => 'RENT']) }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors">
                        Alugar
                    </a>
                    <a href="{{ route('fractions.simulator') }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors {{ request()->routeIs('fractions.*') ? 'text-royal-600' : '' }}">
                        Frações
                    </a>
                    <a href="{{ route('about') }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors {{ request()->routeIs('about') ? 'text-royal-600' : '' }}">
                        Sobre
                    </a>
                    <a href="{{ route('contact') }}" class="font-medium text-slate-700 hover:text-royal-600 transition-colors {{ request()->routeIs('contact') ? 'text-royal-600' : '' }}">
                        Contato
                    </a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="https://wa.me/5500000000000" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-royal-600 to-royal-700 text-white px-6 py-2.5 rounded-full font-medium hover:from-royal-700 hover:to-royal-800 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" class="md:hidden p-2 text-slate-600 hover:text-royal-600" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <nav class="container mx-auto px-4 py-4 flex flex-col gap-4">
                <a href="{{ route('home') }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Início</a>
                <a href="{{ route('properties.index', ['transaction' => 'SALE']) }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Comprar</a>
                <a href="{{ route('properties.index', ['transaction' => 'RENT']) }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Alugar</a>
                <a href="{{ route('fractions.simulator') }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Frações</a>
                <a href="{{ route('about') }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Sobre</a>
                <a href="{{ route('contact') }}" class="font-medium text-slate-700 hover:text-royal-600 py-2">Contato</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-slate-900 via-royal-900 to-slate-900 text-white">
        <!-- Wave decoration -->
        <div class="relative">
            <svg class="w-full h-16 text-slate-50 fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
            </svg>
        </div>
        
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo e descrição -->
                <div class="lg:col-span-1">
                    <div class="mb-4">
                        <img src="{{ asset('img/new-logo.png') }}" alt="Edifício Internacional" class="h-16 w-auto brightness-0 invert">
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-sky-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-slate-400 text-sm">Av. Manoel da Nobrega, 1.835 - Itararé<br>São Vicente, São Paulo - CEP 11320-931</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-sky-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-slate-400 text-sm">Rua Pedro Borges Gonçalves, 06 - José Menino<br>Santos, São Paulo - CEP 11065-300</span>
                            </li>
                        </ul>
                    </p>
                </div>

                <!-- Links Rápidos -->
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Links Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-sky-400 transition-colors">Início</a></li>
                        <li><a href="{{ route('properties.index') }}" class="text-slate-400 hover:text-sky-400 transition-colors">Imóveis</a></li>
                        <li><a href="{{ route('properties.index', ['transaction' => 'sale']) }}" class="text-slate-400 hover:text-sky-400 transition-colors">Comprar</a></li>
                        <li><a href="{{ route('properties.index', ['transaction' => 'rent']) }}" class="text-slate-400 hover:text-sky-400 transition-colors">Alugar</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-sky-400 transition-colors">Sobre Nós</a></li>
                    </ul>
                </div>

                <!-- Tipos de Imóveis -->
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Comprar ou Alugar?</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('properties.index', ['transaction' => 'sale']) }}" class="text-slate-400 hover:text-sky-400 transition-colors">Comprar</a></li>
                        <li><a href="{{ route('properties.index', ['transaction' => 'rent']) }}" class="text-slate-400 hover:text-sky-400 transition-colors">Alugar</a></li>
                    </ul>
                </div>

                <!-- Contato -->
                <div>
                    <h4 class="font-semibold text-lg mb-4 text-white">Contato</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-slate-400 text-sm">(13) 3468-5729</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span class="text-slate-400 text-sm">(13) 99630-4781</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-slate-400 text-sm">portaria@edificiointernacional.com.br</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-slate-400 text-sm">
                        © {{ date('Y') }} Edifício Internacional. Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    @stack('scripts')
</body>
</html>

