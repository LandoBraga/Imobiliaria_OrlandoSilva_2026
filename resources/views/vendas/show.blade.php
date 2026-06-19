<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                📄 Detalhes da Venda #{{ $venda->id }}
            </h2>
            <a href="{{ route('vendas.index') }}" class="inline-flex items-center px-5 py-2.5 bg-gray-600 hover:bg-gray-700 rounded-lg font-bold text-xs text-white uppercase tracking-wider transition duration-150 shadow">
                Voltar ao Histórico
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-md flex flex-col items-center text-center">
                    <div class="bg-green-900/30 text-green-400 w-16 h-16 rounded-full flex items-center justify-center text-2xl mb-4 border border-green-700">
                        🤝
                    </div>
                    <span class="px-3 py-1 text-xs font-black uppercase tracking-wider rounded-full bg-green-900 text-green-300 border border-green-700 mb-2">
                        Venda Concluída
                    </span>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Data da Escritura</p>
                    <p class="text-sm font-bold text-gray-200 mb-4">{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>

                    <div class="w-full bg-gray-900 p-4 rounded-lg border border-gray-700 my-2">
                        <span class="block text-xs text-gray-400 uppercase font-medium mb-1">Valor do Negócio</span>
                        <h3 class="text-3xl font-black text-green-400">
                            € {{ number_format($venda->valor_venda, 2, ',', '.') }}
                        </h3>
                    </div>
                </div>

                <div class="lg:col-span-2 grid grid-cols-1 gap-6">

                    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-md">
                        <h4 class="text-sm font-black uppercase tracking-wider text-blue-400 mb-4 flex items-center gap-2">
                            👤 Informação do Cliente Comprador
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-900 p-4 rounded-lg border border-gray-700">
                            <div>
                                <span class="block text-xs text-gray-400 font-medium">Nome Completo</span>
                                <span class="font-bold text-gray-100 uppercase text-sm">{{ $venda->cliente->nome }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 font-medium">NIF (Contribuinte)</span>
                                <span class="font-mono font-bold text-gray-200 text-sm">{{ $venda->cliente->nif }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 font-medium">Email de Contacto</span>
                                <span class="text-gray-300 text-sm">{{ $venda->cliente->email }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-400 font-medium">Telefone</span>
                                <span class="text-gray-300 text-sm">{{ $venda->cliente->telefone }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-md">
                        <h4 class="text-sm font-black uppercase tracking-wider text-red-400 mb-4 flex items-center gap-2">
                            🏢 Detalhes do Apartamento Transacionado
                        </h4>
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/3">
                                <img src="{{ $venda->apartamento->imagem_url }}"
                                    class="w-full h-40 object-cover rounded-lg shadow-md border border-gray-600"
                                    alt="Foto do Imóvel">
                            </div>
                            <div class="flex-1 grid grid-cols-2 gap-4 bg-gray-900 p-4 rounded-lg border border-gray-700">
                                <div>
                                    <span class="block text-xs text-gray-400 font-medium">Referência</span>
                                    <span class="font-mono font-bold text-gray-100 uppercase text-sm">{{ $venda->apartamento->referencia }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 font-medium">Tipologia</span>
                                    <span class="font-bold text-red-400 text-sm">{{ $venda->apartamento->tipologia }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 font-medium">Área Útil</span>
                                    <span class="text-gray-200 font-semibold text-sm">{{ $venda->apartamento->area }} m²</span>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 font-medium">Localização Original</span>
                                    <span class="text-gray-300 text-sm block truncate">{{ $venda->apartamento->morada }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>