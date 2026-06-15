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

            <div class="bg-gray-800 p-4 rounded-lg mb-6 shadow-md border border-gray-700">
                <form action="{{ route('apartamentos.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">
                    
                    <div class="flex-1 w-full">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Pesquisar Imóvel</label>
                        <input type="text" name="search" value="{{ $pesquisa ?? '' }}" 
                               placeholder="Referência ou localização..." 
                               class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white placeholder-gray-500 focus:outline-none focus:border-red-500 text-sm">
                    </div>

                    <div class="w-full md:w-48">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Tipologia</label>
                        <select name="tipologia" class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="">Todas</option>
                            @foreach(['T0', 'T1', 'T2', 'T3', 'T4'] as $tipo)
                                <option value="{{ $tipo }}" {{ (isset($tipologia) && $tipologia == $tipo) ? 'selected' : '' }}>{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full md:w-48">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Ordenar Por</label>
                        <select name="order_by" class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="id" {{ (isset($ordenar) && $ordenar == 'id') ? 'selected' : '' }}>ID do Imóvel</option>
                            <option value="preco" {{ (isset($ordenar) && $ordenar == 'preco') ? 'selected' : '' }}>Preço Base</option>
                            <option value="area" {{ (isset($ordenar) && $ordenar == 'area') ? 'selected' : '' }}>Área útil</option>
                            <option value="tipologia" {{ (isset($ordenar) && $ordenar == 'tipologia') ? 'selected' : '' }}>Tipologia</option>
                        </select>
                    </div>

                    <div class="w-full md:w-40">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Direção</label>
                        <select name="direction" class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="asc" {{ (isset($direcao) && $direcao == 'asc') ? 'selected' : '' }}>Crescente ↑</option>
                            <option value="desc" {{ (isset($direcao) && $direcao == 'desc') ? 'selected' : '' }}>Decrescente ↓</option>
                        </select>
                    </div>

                    <div class="flex gap-2 w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded text-sm transition duration-150">
                            Filtrar
                        </button>
                        <a href="{{ route('apartamentos.index') }}" class="w-full md:w-auto text-center bg-gray-600 hover:bg-gray-700 text-white font-medium px-4 py-2 rounded text-sm transition duration-150">
                            Limpar
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden border border-gray-700">
                <table class="w-full text-left border-collapse text-white text-sm">
                    <thead>
                        <tr class="bg-gray-900 text-gray-400 uppercase text-xs font-semibold tracking-wider border-b border-gray-700">
                            <th class="p-4">Visual</th>
                            <th class="p-4">Referência</th>
                            <th class="p-4">Tipologia</th>
                            <th class="p-4">Localização (Morada)</th>
                            <th class="p-4">Área</th>
                            <th class="p-4">Preço Base</th>
                            <th class="p-4">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($apartamentos as $apartamento)
                            <tr class="hover:bg-gray-750 transition duration-150">
                                <td class="p-4">
                                    <img src="{{ $apartamento->imagem_url ?? 'https://placehold.co/50x50?text=Casa' }}" class="w-10 h-10 object-cover rounded shadow border border-gray-600" alt="Foto">
                                </td>
                                <td class="p-4 font-bold text-red-400">{{ $apartamento->referencia }}</td>
                                <td class="p-4">{{ $apartamento->tipologia }}</td>
                                <td class="p-4 text-gray-300">{{ $apartamento->morada }}</td>
                                <td class="p-4 font-semibold">{{ $apartamento->area }} m²</td>
                                <td class="p-4 font-bold text-gray-200">€ {{ number_format($apartamento->preco, 2, ',', '.') }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 text-xs font-extrabold rounded {{ $apartamento->estado == 'Disponível' ? 'bg-green-900 text-green-300 border border-green-600' : 'bg-red-900 text-red-300 border border-red-600' }}">
                                        {{ strtoupper($apartamento->estado) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-8 text-center text-gray-400 bg-gray-800">
                                    Nenhum apartamento encontrado com os filtros selecionados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>