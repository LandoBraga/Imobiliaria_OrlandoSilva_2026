<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                🏢 Carteira de Imóveis
            </h2>
            <a href="{{ route('apartamentos.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded font-bold text-xs text-white uppercase tracking-wider hover:bg-red-700 transition duration-150 shadow">
                + Inserir Apartamento
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 font-bold tracking-wider">
                        <tr>
                            <th class="px-4 py-3 w-20 text-center">Visual</th>
                            <th class="px-4 py-3">Referência</th>
                            <th class="px-4 py-3">Tipologia</th>
                            <th class="px-4 py-3">Localização (Morada)</th>
                            <th class="px-4 py-3 text-right">Área</th>
                            <th class="px-4 py-3 text-right">Preço Base</th>
                            <th class="px-4 py-3 text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($apartamentos as $apartamento)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <td class="px-4 py-3 text-center align-middle">
                                    <img src="{{ $apartamento->imagem_url ?? 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=150&auto=format&fit=crop&q=60' }}" 
                                         alt="Foto do imóvel {{ $apartamento->referencia }}" 
                                         class="w-14 h-14 rounded-md object-cover border border-gray-200 dark:border-gray-600 shadow-md mx-auto">
                                </td>
                                
                                <td class="px-4 py-3 font-black text-gray-900 dark:text-white uppercase tracking-tight align-middle">
                                    {{ $apartamento->referencia }}
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-700 dark:text-gray-300 align-middle">
                                    {{ $apartamento->tipologia }}
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-400 align-middle">
                                    {{ $apartamento->morada }}
                                </td>
                                <td class="px-4 py-3 text-right font-medium text-gray-900 dark:text-white align-middle">
                                    {{ $apartamento->area }} m²
                                </td>
                                <td class="px-4 py-3 text-right font-bold text-gray-900 dark:text-white align-middle">
                                    € {{ number_format($apartamento->preco, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-center align-middle">
                                    @if($apartamento->estado === 'Disponível')
                                        <span class="px-2.5 py-1 text-xs font-black uppercase tracking-wider bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 rounded">
                                            Disponível
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 text-xs font-black uppercase tracking-wider bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 rounded">
                                            Vendido
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-8 text-gray-500 dark:text-gray-400 font-medium">
                                    Nenhum imóvel disponível ou registado na carteira ativa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>