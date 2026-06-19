<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                👥 Base de Clientes
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

            <div class="bg-gray-800 p-5 rounded-xl mb-6 shadow-md border border-gray-700">
                <form action="{{ route('clientes.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">
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
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-blue-400 hover:text-blue-300 font-bold uppercase text-xs tracking-wider transition duration-150 hover:underline">
                                            Editar
                                        </a>

                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" 
                                              onsubmit="return confirm('Tem a certeza absoluta que deseja eliminar este cliente? Esta ação não pode ser desfeita.');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 font-bold uppercase text-xs tracking-wider transition duration-150 hover:underline">
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