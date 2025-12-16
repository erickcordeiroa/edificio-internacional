@extends('layouts.app')

@section('title', 'Simulador de Frações')
@section('meta_description', 'Simule o valor da sua fração ideal com base no valor total do condomínio')

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
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    Calculadora
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Simulador de <span class="text-sky-400">Condomínio</span>
                </h1>
                <p class="text-slate-300 text-lg">
                    Calcule o valor correspondente ao seu condomínio ideal
                </p>
            </div>
        </div>
    </section>

    <!-- How it Works + Simulator -->
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="max-w-[768px] mx-auto">                

                <!-- Simulator Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-royal-800 mb-2">Descubra o Valor do Seu Condomínio de Forma Simples e Rápida!</h2>
                        <p class="text-slate-600 text-sm mt-4">
                            Agora você pode calcular o valor exato de cada item do seu condomínio!
                        </p>
                        <p class="text-slate-500 text-sm mt-2">
                            Basta inserir o valor desejado e o número da sua unidade para ver automaticamente o custo de cada item do seu condomínio.
                        </p>
                        <p class="text-slate-600 text-sm mt-2 font-medium">
                            Transparência e controle na ponta dos seus dedos.
                        </p>
                    </div>

                    <form id="simulator-form" class="space-y-6">
                        @csrf
                        
                        <!-- Property Type -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-3">Selecione o tipo do imóvel:</label>
                            <div class="flex flex-wrap gap-6">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="property_type" value="loja" class="w-4 h-4 text-royal-600 border-slate-300 focus:ring-royal-500">
                                    <span class="text-slate-700">Loja</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="property_type" value="apartamento" class="w-4 h-4 text-royal-600 border-slate-300 focus:ring-royal-500">
                                    <span class="text-slate-700">Apartamento</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="property_type" value="box" class="w-4 h-4 text-royal-600 border-slate-300 focus:ring-royal-500">
                                    <span class="text-slate-700">Box</span>
                                </label>
                            </div>
                        </div>

                        <!-- Property Number -->
                        <div>
                            <label for="property_number" class="block text-sm font-semibold text-slate-700 mb-2">Digite o número do seu apartamento, loja ou box:</label>
                            <input 
                                type="text" 
                                id="property_number" 
                                name="property_number" 
                                class="form-input"
                                placeholder="Exemplo: 08"
                            >
                        </div>

                        <!-- Rateio Value -->
                        <div>
                            <label for="rateio_value" class="block text-sm font-semibold text-slate-700 mb-2">Digite o valor do rateio (R$):</label>
                            <input 
                                type="text" 
                                id="rateio_value" 
                                name="rateio_value" 
                                class="form-input"
                                placeholder="Exemplo: 150,00"
                            >
                        </div>

                        <!-- Result Display -->
                        <div id="result-container" class="hidden text-center py-6">
                            <p class="text-slate-600 text-lg">Valor a pagar</p>
                            <p id="result-value" class="text-3xl font-bold text-royal-800 mt-1">R$ 0,00</p>
                        </div>

                        <!-- Error Message -->
                        <div id="error-container" class="hidden text-center py-4">
                            <p id="error-message" class="text-red-600 text-sm"></p>
                        </div>

                        <!-- Clear Button -->
                        <button type="button" id="clear-btn" class="w-full bg-royal-600 hover:bg-royal-700 text-white font-semibold py-4 px-6 rounded-xl transition-colors">
                            Limpar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Cache DOM elements
    const form = document.getElementById('simulator-form');
    const propertyNumber = document.getElementById('property_number');
    const rateioValue = document.getElementById('rateio_value');
    const resultContainer = document.getElementById('result-container');
    const resultValue = document.getElementById('result-value');
    const errorContainer = document.getElementById('error-container');
    const errorMessage = document.getElementById('error-message');
    const clearBtn = document.getElementById('clear-btn');

    // Current fraction data
    let currentFraction = null;

    // Format currency input
    rateioValue.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value === '') {
            e.target.value = '';
            return;
        }
        value = (parseInt(value) / 100).toFixed(2);
        value = value.replace('.', ',');
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        e.target.value = value === '0,00' ? '' : value;
        calculateResult();
    });

    // Listen for property type and number changes
    document.querySelectorAll('input[name="property_type"]').forEach(radio => {
        radio.addEventListener('change', fetchFraction);
    });

    propertyNumber.addEventListener('input', debounce(fetchFraction, 500));

    // Fetch fraction from server
    async function fetchFraction() {
        const type = document.querySelector('input[name="property_type"]:checked')?.value;
        const number = propertyNumber.value.trim();

        if (!type || !number) {
            currentFraction = null;
            hideResult();
            return;
        }

        try {
            const response = await fetch('{{ route("fractions.find") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ type, number })
            });

            const data = await response.json();

            if (data.success) {
                currentFraction = data.fraction;
                hideError();
                calculateResult();
            } else {
                currentFraction = null;
                showError(data.message || 'Fração não encontrada.');
                hideResult();
            }
        } catch (error) {
            console.error('Error:', error);
            currentFraction = null;
            showError('Erro ao buscar fração. Tente novamente.');
            hideResult();
        }
    }

    // Calculate and display result
    function calculateResult() {
        if (!currentFraction) {
            hideResult();
            return;
        }

        const valueStr = rateioValue.value.replace(/\./g, '').replace(',', '.');
        const totalValue = parseFloat(valueStr);

        if (isNaN(totalValue) || totalValue <= 0) {
            hideResult();
            return;
        }

        const calculatedValue = totalValue * currentFraction.fraction;
        resultValue.textContent = 'R$ ' + calculatedValue.toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        showResult();
    }

    // UI helpers
    function showResult() {
        resultContainer.classList.remove('hidden');
    }

    function hideResult() {
        resultContainer.classList.add('hidden');
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorContainer.classList.remove('hidden');
    }

    function hideError() {
        errorContainer.classList.add('hidden');
    }

    // Clear form
    clearBtn.addEventListener('click', function() {
        form.reset();
        currentFraction = null;
        hideResult();
        hideError();
    });

    // Debounce helper
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
</script>
@endpush
