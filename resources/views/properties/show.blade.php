@extends('layouts.app')

@section('title', $property->title)
@section('meta_description', Str::limit(strip_tags($property->description), 160))

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-slate-100 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-royal-600 transition-colors">Início</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('properties.index') }}" class="hover:text-royal-600 transition-colors">Imóveis</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-royal-600 font-medium">{{ Str::limit($property->title, 50) }}</span>
            </nav>
        </div>
    </section>

    <!-- Gallery -->
    <section class="bg-slate-900 py-6 lg:py-10">
        <div class="container mx-auto px-4">
            <!-- Main Image - Full Width -->
            <div class="mb-4">
                <div class="aspect-[16/9] max-h-[70vh] rounded-2xl overflow-hidden bg-slate-800 mx-auto">
                    @if($property->photos->count() > 0)
                        <img 
                            id="main-gallery-image"
                            src="{{ $property->photos->first()->full_url }}" 
                            alt="{{ $property->title }}"
                            class="w-full h-full object-contain bg-slate-900"
                        >
                    @else
                        <img 
                            id="main-gallery-image"
                            src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1920&h=1080&fit=crop" 
                            alt="{{ $property->title }}"
                            class="w-full h-full object-contain bg-slate-900"
                        >
                    @endif
                </div>
            </div>

            <!-- Thumbnails Row -->
            @if($property->photos->count() > 1)
                <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-hide">
                    @foreach($property->photos as $index => $photo)
                        <div 
                            class="flex-shrink-0 w-32 lg:w-40 aspect-[16/9] rounded-lg overflow-hidden bg-slate-800 cursor-pointer hover:ring-2 hover:ring-royal-500 transition-all gallery-thumb {{ $index === 0 ? 'ring-2 ring-royal-500' : '' }}"
                            onclick="changeMainImage('{{ $photo->full_url }}', this)"
                        >
                            <img 
                                src="{{ $photo->full_url }}" 
                                alt="{{ $property->title }} - Foto {{ $index + 1 }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    @endforeach
                </div>
                
                <!-- Photo Counter -->
                <div class="mt-4 flex items-center justify-center gap-2 text-slate-400 text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ $property->photos->count() }} {{ $property->photos->count() === 1 ? 'foto' : 'fotos' }}</span>
                </div>
            @endif
        </div>
    </section>

    <!-- Property Details -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Header -->
                    <div class="mb-8">
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($property->type === 'SALE')
                                <span class="badge-sale text-white text-sm font-medium px-3 py-1 rounded-full">Venda</span>
                            @else
                                <span class="badge-rent text-white text-sm font-medium px-3 py-1 rounded-full">Aluguel</span>
                            @endif
                            @if($property->is_featured)
                                <span class="bg-amber-500 text-white text-sm font-medium px-3 py-1 rounded-full flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    Destaque
                                </span>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">{{ $property->title }}</h1>
                        
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="w-5 h-5 text-royal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $property->location }}
                        </div>
                    </div>

                    <!-- Price Mobile -->
                    <div class="lg:hidden bg-gradient-to-r from-royal-600 to-royal-700 text-white rounded-2xl p-6 mb-8">
                        <div class="text-sm text-royal-200 mb-1">{{ $property->type_name }}</div>
                        <div class="text-3xl font-bold">{{ $property->formatted_price }}</div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-slate-800 mb-4">Descrição</h2>
                        <div class="prose prose-slate max-w-none">
                            {!! $property->description !!}
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-slate-800 mb-4">Localização</h2>
                        <div class="bg-slate-100 rounded-xl p-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-royal-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <p class="font-medium text-slate-800">{{ $property->location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Photos Section -->
                    @if($property->photos->count() > 0)
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-slate-800 mb-4">Todas as Fotos</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($property->photos as $index => $photo)
                                    <div 
                                        class="aspect-[16/9] rounded-xl overflow-hidden bg-slate-100 cursor-pointer hover:opacity-90 transition-opacity"
                                        onclick="openLightbox('{{ $photo->full_url }}')"
                                    >
                                        <img 
                                            src="{{ $photo->full_url }}" 
                                            alt="{{ $property->title }} - Foto {{ $index + 1 }}"
                                            class="w-full h-full object-cover"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-28">
                        <!-- Price Card Desktop -->
                        <div class="hidden lg:block bg-white rounded-2xl shadow-xl border border-slate-100 p-6 mb-6">
                            <div class="text-sm text-slate-500 mb-1">{{ $property->type_name }}</div>
                            <div class="text-3xl font-bold text-royal-600 mb-4">{{ $property->formatted_price }}</div>
                        </div>

                        <!-- Contact Card -->
                        <div class="bg-gradient-to-br from-royal-800 to-royal-900 rounded-2xl p-6 text-white">
                            <h3 class="text-xl font-semibold mb-4">Interessado neste imóvel?</h3>
                            <p class="text-royal-200 text-sm mb-6">Entre em contato conosco para mais informações.</p>
                            
                            @if($property->responsible_person)
                                <div class="mb-4 p-3 bg-white/10 rounded-lg">
                                    <div class="text-xs text-royal-300 mb-1">Responsável</div>
                                    <div class="font-medium">{{ $property->responsible_person }}</div>
                                </div>
                            @endif

                            <div class="space-y-3">
                                @if($property->whatsapp_link)
                                    <a href="{{ $property->whatsapp_link }}" target="_blank" class="flex items-center justify-center gap-2 w-full bg-green-500 text-white py-3 rounded-xl font-medium hover:bg-green-600 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                        </svg>
                                        WhatsApp
                                    </a>
                                @endif
                                
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', $property->contact) }}" class="flex items-center justify-center gap-2 w-full bg-white/10 text-white py-3 rounded-xl font-medium hover:bg-white/20 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    {{ $property->contact }}
                                </a>
                            </div>
                        </div>

                        <!-- Share -->
                        <div class="mt-6 flex items-center justify-center gap-4">
                            <span class="text-sm text-slate-500">Compartilhar:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-600 hover:bg-blue-500 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($property->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-600 hover:bg-green-500 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Properties -->
    @if($relatedProperties->count() > 0)
        <section class="py-16 bg-slate-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800 text-center mb-12">
                    Imóveis <span class="text-royal-600">Similares</span>
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedProperties as $relatedProperty)
                        @include('components.property-card', ['property' => $relatedProperty])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/95 flex items-center justify-center" onclick="closeLightbox()">
        <button class="absolute top-4 right-4 text-white hover:text-slate-300 transition-colors" onclick="closeLightbox()">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <img id="lightbox-image" src="" alt="" class="max-w-[95vw] max-h-[95vh] object-contain" onclick="event.stopPropagation()">
    </div>
@endsection

@push('scripts')
<script>
    function changeMainImage(src, element) {
        document.getElementById('main-gallery-image').src = src;
        
        // Update active thumbnail
        document.querySelectorAll('.gallery-thumb').forEach(thumb => {
            thumb.classList.remove('ring-2', 'ring-royal-500');
        });
        
        if (element) {
            element.classList.add('ring-2', 'ring-royal-500');
        }
    }

    function openLightbox(src) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        lightboxImage.src = src;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }

    // Close lightbox with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
@endpush

@push('styles')
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endpush
