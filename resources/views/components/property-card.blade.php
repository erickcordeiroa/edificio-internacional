<article class="property-card bg-white rounded-2xl shadow-lg overflow-hidden group">
    <!-- Image -->
    <a href="{{ route('properties.show', $property->slug) }}" class="block relative aspect-[4/3] overflow-hidden">
        @if($property->featuredPhoto)
            <img 
                src="{{ $property->featuredPhoto->full_url }}" 
                alt="{{ $property->title }}"
                class="property-image w-full h-full object-cover"
            >
        @else
            <img 
                src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=600&fit=crop" 
                alt="{{ $property->title }}"
                class="property-image w-full h-full object-cover"
            >
        @endif
        
        <!-- Badge -->
        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            @if($property->type === 'SALE')
                <span class="badge-sale text-white text-xs font-semibold px-3 py-1 rounded-full">Venda</span>
            @else
                <span class="badge-rent text-white text-xs font-semibold px-3 py-1 rounded-full">Aluguel</span>
            @endif
        </div>

        @if($property->is_featured)
            <div class="absolute top-4 right-4">
                <span class="bg-amber-500 text-white text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Destaque
                </span>
            </div>
        @endif

        <!-- Image overlay on hover -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>

    <!-- Content -->
    <div class="p-5">
        <!-- Type Badge -->
        <span class="inline-block px-3 py-1 bg-royal-100 text-royal-700 text-xs font-medium rounded-full mb-3">
            {{ $property->type_name }}
        </span>

        <!-- Title -->
        <h3 class="font-semibold text-lg text-slate-800 mb-2 line-clamp-2">
            <a href="{{ route('properties.show', $property->slug) }}" class="hover:text-royal-600 transition-colors">
                {{ $property->title }}
            </a>
        </h3>

        <!-- Location -->
        <p class="text-slate-500 text-sm flex items-center gap-1 mb-4">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            {{ Str::limit($property->location, 50) }}
        </p>

        <!-- Contact -->
        <div class="flex items-center gap-2 text-sm text-slate-600 mb-4 pb-4 border-b border-slate-100">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            {{ $property->contact }}
        </div>

        <!-- Price -->
        <div class="flex items-center justify-between">
            <div class="price-display">{{ $property->formatted_price }}</div>
            <a href="{{ route('properties.show', $property->slug) }}" class="w-10 h-10 bg-royal-600 text-white rounded-full flex items-center justify-center hover:bg-royal-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</article>
