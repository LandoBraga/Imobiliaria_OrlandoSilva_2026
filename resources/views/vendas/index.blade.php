<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                📊 Histórico de Vendas
            </h2>
            <a href="{{ route('vendas.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-700 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-wider hover:bg-blue-800 transition duration-150 shadow-md">
                Registar Nova Venda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-700">
                <table class="w-full text-left border-collapse text-white text-sm">
                    <thead>
                        <tr class="bg-gray-900 text-gray-400 uppercase text-xs font-semibold tracking-wider border-b border-gray-700">
                            <th class="p-4">ID Venda</th>
                            <th class="p-4">Cliente</th>
                            <th class="p-4">Apartamento (Ref)</th>
                            <th class="p-4">Data da Venda</th>
                            <th class="p-4">Preço Final</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($vendas as $venda)
                            <tr class="hover:bg-gray-750 transition duration-150">
                                <td class="p-4 font-semibold text-gray-400">#{{ $venda->id }}</td>
                                <td class="p-4 font-medium text-gray-200 uppercase">{{ $venda->cliente->nome }}</td>
                                <td class="p-4 text-blue-400 font-bold">
                                    {{ $venda->apartamento->referencia }} ({{ $venda->apartamento->tipologia }})
                                </td>
                                <td class="p-4 text-gray-300">
                                    {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}
                                </td>
                                <td class="p-4 font-bold text-green-400">
                                    € {{ number_format($venda->valor_venda, 2, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-400 bg-gray-800">
                                    Nenhuma transação comercial registada no sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>