<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200 p-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Registar Transação Comercial (Venda)</h2>
            <p class="text-sm text-gray-500">Selecione o comprador e o imóvel disponível para formalizar a venda.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Atenção!</strong> Verifique os dados inseridos.
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl">
            <form action="{{ route('vendas.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cliente Comprador *</label>
                    <select name="cliente_id" id="cliente_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        <option value="">-- Selecione o Cliente --</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }} (NIF: {{ $cliente->nif }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="apartamento_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apartamento para Venda (Apenas Disponíveis) *</label>
                    <select name="apartamento_id" id="apartamento_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        <option value="">-- Selecione o Imóvel --</option>
                        @foreach($apartamentos as $ap)
                            <option value="{{ $ap->id }}" {{ old('apartamento_id') == $ap->id ? 'selected' : '' }}>
                                {{ $ap->referencia }} - {{ $ap->tipologia }} em {{ $ap->morada }} (Preço Base: €{{ number_format($ap->preco, 2, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="data_venda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Escritura *</label>
                        <input type="date" name="data_venda" id="data_venda" value="{{ old('data_venda', date('Y-m-25')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                    </div>

                    <div>
                        <div>
    <label for="valor_venda" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preço de Venda Efetivo (€) *</label>
    <input type="number" name="valor_venda" id="valor_venda" value="{{ old('valor_venda') }}" required min="0" step="0.01" placeholder="Ex: 180000" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
</div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('vendas.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md text-sm font-medium">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md text-sm font-medium shadow-sm">
                        Confirmar Venda
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>