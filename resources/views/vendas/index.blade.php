<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200">
        <div class="d-flex justify-content-between align-items-center mb-3 p-4">
            <h2 class="text-2xl font-bold">Histórico de Vendas</h2>
            <a href="{{ route('vendas.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                Registar Nova Venda
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">ID Venda</th>
                        <th class="px-4 py-3">Cliente</th>
                        <th class="px-4 py-3">Apartamento (Ref)</th>
                        <th class="px-4 py-3">Data da Venda</th>
                        <th class="px-4 py-3">Preço Final</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($vendas as $venda)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-3 font-semibold">{{ $venda->id }}</td>
                            <td class="px-4 py-3">{{ $venda->cliente->nome ?? '---' }}</td>
                            <td class="px-4 py-3 text-blue-500 font-medium">
                                {{ $venda->apartamento->referencia ?? '---' }} ({{ $venda->apartamento->tipologia ?? '---' }})
                            </td>
                            <td class="px-4 py-3">
                                {{ date('d/m/Y', strtotime($venda->data_venda)) }}
                            </td>
                            <td class="px-4 py-3 font-bold text-green-600">
                                € {{ number_format($venda->valor_venda, 2, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-muted">Nenhuma transação comercial registada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>