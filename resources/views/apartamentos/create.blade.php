<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200 p-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Adicionar Novo Apartamento</h2>
            <p class="text-sm text-gray-500">Insira as características do imóvel para a listagem da imobiliária.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Atenção!</strong> Há campos incorretos no formulário.
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl">
            <form action="{{ route('apartamentos.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="referencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referência Única *</label>
                        <input type="text" name="referencia" id="referencia" value="{{ old('referencia') }}" placeholder="Ex: APT-004" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        @error('referencia') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="tipologia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipologia *</label>
                        <input type="text" name="tipologia" id="tipologia" value="{{ old('tipologia') }}" placeholder="Ex: T2" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        @error('tipologia') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="morada" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Morada Completa *</label>
                    <input type="text" name="morada" id="morada" value="{{ old('morada') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                    @error('morada') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Área (m²) *</label>
                        <input type="number" name="area" id="area" value="{{ old('area') }}" required min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        @error('area') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="preco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preço (€) *</label>
                        <input type="number" name="preco" id="preco" value="{{ old('preco') }}" required min="0" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                        @error('preco') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado *</label>
                        <select name="estado" id="estado" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black dark:text-white dark:bg-gray-700">
                            <option value="Disponível" {{ old('estado') == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                            <option value="Vendido" {{ old('estado') == 'Vendido' ? 'selected' : '' }}>Vendido</option>
                        </select>
                        @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('apartamentos.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md text-sm font-medium">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md text-sm font-medium shadow-sm">
                        Gravar Imóvel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>