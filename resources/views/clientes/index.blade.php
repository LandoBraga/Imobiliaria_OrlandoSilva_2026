<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                👥 Base de Clientes
            </h2>
            <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded font-bold text-xs text-white uppercase tracking-wider hover:bg-red-700 transition duration-150 shadow">
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
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 shadow-sm flex items-center">
                    <span class="mr-3 text-xl">⚠️</span>
                    <div>
                        <strong class="font-black uppercase text-xs tracking-wider block">Operação Recusada</strong>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 font-bold tracking-wider">
                        <tr>
                            <th class="px-4 py-3">Nome do Cliente</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Telefone</th>
                            <th class="px-4 py-3">NIF</th>
                            <th class="px-4 py-3">Localização (Morada)</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($clientes as $cliente)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <td class="px-4 py-3 font-black text-gray-900 dark:text-white uppercase tracking-tight align-middle">
                                    {{ $cliente->nome }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-600 dark:text-gray-400 align-middle">
                                    {{ $cliente->email }}
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-400 align-middle">
                                    {{ $cliente->telefone ?? '---' }}
                                </td>
                                <td class="px-4 py-3 font-mono text-gray-700 dark:text-gray-300 align-middle">
                                    {{ $cliente->nif }}
                                </td>
                                <td class="px-4 py-3 text-gray-600 dark:text-gray-400 align-middle">
                                    {{ $cliente->morada }}
                                </td>
                                <td class="px-4 py-3 text-center align-middle">
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Tem a certeza que deseja remover este cliente?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold text-xs uppercase tracking-wider transition duration-150">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-8 text-gray-500 dark:text-gray-400 font-medium">
                                    Nenhum cliente registado na base de dados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>