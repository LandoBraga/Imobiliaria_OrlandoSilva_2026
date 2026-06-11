<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200">
        <div class="d-flex justify-content-between align-items-center mb-3 p-4">
            <h2 class="text-2xl font-bold">Lista de Apartamentos</h2>
            <a href="{{ route('apartamentos.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                Adicionar Apartamento
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3">{{ session('success') }}</div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">Referência</th>
                        <th class="px-4 py-3">Tipologia</th>
                        <th class="px-4 py-3">Morada</th>
                        <th class="px-4 py-3">Área ($m^2$)</th>
                        <th class="px-4 py-3">Preço</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($apartamentos as $apartamento)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-3 font-semibold text-blue-500">{{ $apartamento->referencia }}</td>
                            <td class="px-4 py-3">{{ $apartamento->tipologia }}</td>
                            <td class="px-4 py-3">{{ $apartamento->morada }}</td>
                            <td class="px-4 py-3">{{ $apartamento->area }} m²</td>
                            <td class="px-4 py-3">€ {{ number_format($apartamento->preco, 2, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs font-bold rounded {{ $apartamento->estado == 'Disponível' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $apartamento->estado }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="{{ route('apartamentos.show', $apartamento->id) }}" class="text-blue-600 hover:text-blue-900">Detalhes</a>
                                <a href="{{ route('apartamentos.edit', $apartamento->id) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                <form action="{{ route('apartamentos.destroy', $apartamento->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem a certeza que deseja apagar este imóvel?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-4 text-muted">Nenhum apartamento registado no sistema.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>