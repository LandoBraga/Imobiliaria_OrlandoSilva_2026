<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                🏢 Carteira de Imóveis {{ $estado ? "($estado)" : "" }}
            </h2>
            <div class="flex items-center gap-3">
                <div class="bg-gray-800 p-1 rounded-lg border border-gray-700 hidden sm:flex">
                    <a href="{{ request()->fullUrlWithQuery(['layout' => 'table']) }}" class="px-3 py-1.5 rounded text-xs font-bold uppercase transition {{ $layout !== 'grid' ? 'bg-red-700 text-white' : 'text-gray-400 hover:text-white' }}">Tabela</a>
                    <a href="{{ request()->fullUrlWithQuery(['layout' => 'grid']) }}" class="px-3 py-1.5 rounded text-xs font-bold uppercase transition {{ $layout === 'grid' ? 'bg-red-700 text-white' : 'text-gray-400 hover:text-white' }}">Grelha</a>
                </div>
                
                <a href="{{ route('apartamentos.create') }}" class="inline-flex items-center px-6 py-3 bg-red-700 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-wider hover:bg-red-800 transition duration-150 shadow-md">
                    + Inserir Imóvel
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-800 p-5 rounded-xl mb-6 shadow-md border border-gray-700">
                <form action="{{ route('apartamentos.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end gap-4">
                    <input type="hidden" name="layout" value="{{ $layout }}">
                    <input type="hidden" name="estado" value="{{ $estado }}">

                    <div class="md:col-span-2">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Pesquisar Imóvel</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Zonas, moradas ou referências..."
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-red-500 text-sm">
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm font-medium mb-1">Tipologia</label>
                        <select name="tipologia" class="w-full bg-gray-900 border border-gray-600 rounded-lg px-3 py-2.5 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="">Todas</option>
                            @foreach(['T0', 'T1', 'T2', 'T3', 'T4', 'T5'] as $tipo)
                            <option value="{{ $tipo }}" {{ request('tipologia') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm font-medium mb-1">Ordenar Por</label>
                        <select name="order_by" class="w-full bg-gray-900 border border-gray-600 rounded-lg px-3 py-2.5 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="preco" {{ request('order_by') == 'preco' ? 'selected' : '' }}>Preço</option>
                            <option value="area" {{ request('order_by') == 'area' ? 'selected' : '' }}>Área</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm font-medium mb-1">Direção</label>
                        <select name="order_direction" class="w-full bg-gray-900 border border-gray-600 rounded-lg px-3 py-2.5 text-white focus:outline-none focus:border-red-500 text-sm">
                            <option value="asc" {{ request('order_direction') == 'asc' ? 'selected' : '' }}>Crescente</option>
                            <option value="desc" {{ request('order_direction') == 'desc' ? 'selected' : '' }}>Decrescente</option>
                        </select>
                    </div>

                    <div class="md:col-span-5 flex justify-end gap-3 border-t border-gray-700 pt-4 mt-2">
                        <a href="{{ route('apartamentos.index') }}" class="text-center bg-gray-600 hover:bg-gray-700 text-white font-medium px-5 py-2.5 rounded-lg text-sm transition duration-150 shadow">
                            Limpar Filtros
                        </a>
                        <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-medium px-5 py-2.5 rounded-lg text-sm transition duration-150 shadow">
                            Aplicar Filtros
                        </button>
                    </div>
                </form>
            </div>

           @if($layout === 'grid')
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($apartamentos as $apartamento)
                        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700 flex flex-col justify-between group hover:border-gray-500 transition duration-150 relative">
                            
                            <div class="relative h-56 w-full bg-gray-900 overflow-hidden {{ $apartamento->estado === 'Vendido' ? 'opacity-35 mix-blend-luminosity' : '' }}">
                                <img src="{{ !empty($apartamento->imagem_url) && filter_var($apartamento->imagem_url, FILTER_VALIDATE_URL) ? $apartamento->imagem_url : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=500&auto=format&fit=crop&q=60' }}" 
                                     alt="Imóvel" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                
                                <div class="absolute bottom-3 left-3 bg-gray-900/80 backdrop-blur-sm px-3 py-1 rounded text-red-400 font-black text-xs">
                                    {{ $apartamento->tipologia }}
                                </div>
                            </div>

                            <div class="absolute top-3 right-3 z-10">
                                @if($apartamento->estado === 'Disponível')
                                    <span class="inline-flex items-center gap-1.5 text-green-400 font-bold text-xs uppercase tracking-wider bg-gray-900/90 backdrop-blur-sm px-2.5 py-1 rounded-md shadow-md">
                                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                        Disponível
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-red-500 font-black text-xs uppercase tracking-wider bg-gray-900/90 backdrop-blur-sm border border-red-900/50 px-2.5 py-1 rounded-md shadow-md">
                                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                        Vendido
                                    </span>
                                @endif
                            </div>

                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div class="{{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-xs font-bold text-gray-500 tracking-wider">{{ $apartamento->referencia }}</span>
                                        <span class="text-xs text-gray-400 font-medium">📐 {{ $apartamento->area }} m²</span>
                                    </div>
                                    
                                    <h4 class="text-xl font-black text-white tracking-tight mb-2">
                                        € {{ number_format($apartamento->preco, 2, ',', '.') }}
                                    </h4>
                                    
                                    <p class="text-sm text-gray-400 line-clamp-2 mt-1 {{ $apartamento->estado === 'Vendido' ? '' : 'mb-4' }}">
                                        Excelente oportunidade de investimento localizada em: <span class="text-gray-300 font-semibold">{{ $apartamento->morada }}</span>. Zonas envolventes com ótimos acessos e serviços comerciais públicos.
                                    </p>
                                </div>

                                @if($apartamento->estado !== 'Vendido')
                                    <div class="border-t border-gray-700 pt-4 flex justify-end">
                                        <a href="{{ route('apartamentos.edit', $apartamento->id) }}"
                                           class="px-4 py-2 bg-blue-600/20 border border-blue-500/40 rounded-lg font-bold text-xs text-blue-400 uppercase tracking-wider hover:bg-blue-600 hover:text-white transition duration-150 text-center w-full sm:w-auto">
                                            Editar Imóvel
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-gray-800 p-12 text-center text-gray-400 rounded-xl border border-gray-700 shadow-md">
                            Nenhum imóvel encontrado nesta categoria com os critérios selecionados.
                        </div>
                    @endforelse
                </div>
            @else
                <div class="bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-700">
                    <table class="w-full text-left border-collapse text-white text-sm">
                        <thead>
                            <tr class="bg-gray-900 text-gray-400 uppercase text-xs font-semibold tracking-wider border-b border-gray-700">
                                <th class="p-4 w-20">Visual</th>
                                <th class="p-4">Referência</th>
                                <th class="p-4">Tipologia</th>
                                <th class="p-4">Localização (Morada)</th>
                                <th class="p-4">Área Útil</th>
                                <th class="p-4 text-right">Preço Base</th>
                                <th class="p-4 text-center">Estado</th>
                                <th class="p-4 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse($apartamentos as $apartamento)
                            <tr class="hover:bg-gray-750 transition duration-150 border-b border-gray-700">
                                <td class="p-4 {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    <img src="{{ $apartamento->imagem_url ?? asset('images/default-imovel.png') }}"
                                        alt="Imóvel" class="w-12 h-12 object-cover rounded-lg border border-gray-700 shadow-sm">
                                </td>
                                <td class="p-4 font-bold text-gray-150 {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    {{ $apartamento->referencia }}
                                </td>
                                <td class="p-4 {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    <span class="text-red-400 font-bold">{{ $apartamento->tipologia }}</span>
                                </td>
                                <td class="p-4 text-gray-400 {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    {{ $apartamento->morada }}
                                </td>
                                <td class="p-4 text-gray-300 {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    {{ $apartamento->area }} m²
                                </td>
                                <td class="p-4 text-right text-gray-100 font-black {{ $apartamento->estado === 'Vendido' ? 'opacity-40' : '' }}">
                                    € {{ number_format($apartamento->preco, 2, ',', '.') }}
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center">
                                        @if($apartamento->estado === 'Disponível')
                                        <span class="inline-flex items-center gap-1.5 text-green-400 font-bold text-xs uppercase tracking-wider">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                            Disponível
                                        </span>
                                        @else
                                        <span class="inline-flex items-center gap-1.5 text-red-500 font-black text-xs uppercase tracking-wider border border-red-900/30 bg-red-950/20 px-2.5 py-1 rounded-md">
                                            <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                            Vendido
                                        </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('apartamentos.edit', $apartamento->id) }}"
                                            class="px-2.5 py-1.5 bg-blue-600/20 border border-blue-500/40 rounded-md font-bold text-[10px] text-blue-400 uppercase tracking-wider hover:bg-blue-600 hover:text-white transition duration-150">
                                            Editar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="p-8 text-center text-gray-400 bg-gray-800">
                                    Nenhum imóvel encontrado com os critérios selecionados.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>