<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200">
        <div class="d-flex justify-content-between align-items-center mb-3 p-4">
            <h2 class="text-2xl font-bold">Lista de Clientes</h2>
            <a href="{{ route('clientes.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Adicionar Cliente
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3">{{ session('success') }}</div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Telefone</th>
                        <th class="px-4 py-3">Morada</th>
                        <th class="px-4 py-3">NIF</th>
                        <th class="px-4 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($clientes as $cliente)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-3 font-semibold">{{ $cliente->id }}</td>
                            <td class="px-4 py-3">{{ $cliente->nome }}</td>
                            <td class="px-4 py-3">{{ $cliente->email }}</td>
                            <td class="px-4 py-3">{{ $cliente->telefone ?? '---' }}</td>
                            <td class="px-4 py-3">{{ $cliente->morada }}</td>
                            <td class="px-4 py-3">{{ $cliente->nif }}</td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="text-blue-600 hover:text-blue-900">Detalhes</a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem a certeza que deseja apagar este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-4 text-muted">Nenhum cliente registado no sistema.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>