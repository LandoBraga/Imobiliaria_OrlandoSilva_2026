<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                👥 Base de Clientes @if($filtro === 'ativos') (Ativos) @elseif($filtro === 'inativos') (Sem Compras) @endif
            </h2>
            <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-6 py-3 bg-red-700 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-wider hover:bg-red-800 transition duration-150 shadow-md">
                + Adicionar Cliente
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

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 shadow-sm">
                {{ session('error') }}
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">

                <a href="{{ route('clientes.index') }}" class="block bg-gray-800 border rounded-xl p-5 shadow-md flex items-center justify-between transition duration-150 {{ empty($filtro) ? 'border-blue-500 scale-[1.01]' : 'border-gray-700 hover:border-gray-500' }}">
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400">Total de Clientes</span>
                        <h3 class="text-2xl font-black text-white mt-1">{{ $totalClientes ?? 0 }}</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Registados no sistema</p>
                    </div>
                    <span class="text-xl bg-gray-900 p-3 rounded-lg border border-gray-750">👥</span>
                </a>

                <a href="{{ route('clientes.index', ['filtro' => 'ativos']) }}" class="block bg-gray-800 border rounded-xl p-5 shadow-md flex items-center justify-between transition duration-150 {{ $filtro === 'ativos' ? 'border-purple-500 scale-[1.01]' : 'border-gray-700 hover:border-purple-500/50' }}">
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400">Clientes Ativos</span>
                        <h3 class="text-2xl font-black text-purple-400 mt-1">{{ $clientesComCompras ?? 0 }}</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Com escrituras assinadas</p>
                    </div>
                    <span class="text-xl bg-gray-900 p-3 rounded-lg border border-gray-750">🛍️</span>
                </a>

                <a href="{{ route('clientes.index', ['filtro' => 'inativos']) }}" class="block bg-gray-800 border rounded-xl p-5 shadow-md flex items-center justify-between transition duration-150 {{ $filtro === 'inativos' ? 'border-yellow-600 scale-[1.01]' : 'border-gray-700 hover:border-yellow-600/50' }}">
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400">Sem Compras</span>
                        <h3 class="text-2xl font-black text-yellow-500 mt-1">{{ $clientesSemCompras ?? 0 }}</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">Ainda em fase de prospeção</p>
                    </div>
                    <span class="text-xl bg-gray-900 p-3 rounded-lg border border-gray-750">⏳</span>
                </a>

            </div>

            <div class="bg-gray-800 p-5 rounded-xl mb-6 shadow-md border border-gray-700">
                <form action="{{ route('clientes.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">
                    @if(!empty($filtro))
                        <input type="hidden" name="filtro" value="{{ $filtro }}">
                    @endif

                    <div class="flex-1 w-full">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Pesquisar Cliente</label>
                        <input type="text" name="search" value="{{ $pesquisa ?? '' }}"
                            placeholder="Pesquise por nome ou NIF do cliente..."
                            class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-2.5 text-white placeholder-gray-500 focus:outline-none focus:border-red-500 text-sm">
                    </div>
                    <div class="flex gap-2 w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto bg-red-700 hover:bg-red-800 text-white font-medium px-5 py-2.5 rounded-lg text-sm transition duration-150 shadow">
                            Filtrar
                        </button>
                        <a href="{{ route('clientes.index') }}" class="w-full md:w-auto text-center bg-gray-600 hover:bg-gray-700 text-white font-medium px-5 py-2.5 rounded-lg text-sm transition duration-150 shadow">
                            Limpar
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-700">
                <table class="w-full text-left border-collapse text-white text-sm">
                    <thead>
                        <tr class="bg-gray-900 text-gray-400 uppercase text-xs font-semibold tracking-wider border-b border-gray-700">
                            <th class="p-4">Nome do Cliente</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Telefone</th>
                            <th class="p-4">NIF</th>
                            <th class="p-4">Localização (Morada)</th>
                            <th class="p-4 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($clientes as $cliente)
                        <tr class="hover:bg-gray-750 transition duration-150">
                            <td class="p-4 font-bold text-gray-100 uppercase">{{ $cliente->nome }}</td>
                            <td class="p-4 text-gray-300">{{ $cliente->email }}</td>
                            <td class="p-4 text-gray-300">{{ $cliente->telefone }}</td>
                            <td class="p-4 font-mono font-semibold text-gray-200">{{ $cliente->nif }}</td>
                            <td class="p-4 text-gray-400">{{ $cliente->morada }}</td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('clientes.edit', $cliente->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-blue-600/20 border border-blue-500/40 rounded-md font-bold text-[10px] text-blue-400 uppercase tracking-wider hover:bg-blue-600 hover:text-white transition duration-150 shadow-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                        onsubmit="return confirm('Tem a certeza absoluta que deseja eliminar este cliente?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-700/20 border border-red-500/40 rounded-md font-bold text-[10px] text-red-400 uppercase tracking-wider hover:bg-red-700 hover:text-white transition duration-150 shadow-sm">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 bg-gray-800">
                                Nenhum cliente encontrado com os filtros selecionados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>