<x-app-layout>
    <div class="container mt-4 text-gray-800 dark:text-gray-200 p-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold">Adicionar Novo Cliente</h2>
            <p class="text-sm text-gray-500">Insira os dados do cliente para registar no sistema da imobiliária.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Atenção!</strong> Há campos que precisam de correção.
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl">
            <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome Completo *</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 text-black dark:text-white">
                    @error('nome') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço de Email *</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 text-black dark:text-white">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 text-black dark:text-white">
                        @error('telefone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="nif" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIF (9 dígitos) *</label>
                        <input type="text" name="nif" id="nif" value="{{ old('nif') }}" required maxlength="9" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 text-black dark:text-white">
                        @error('nif') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label for="morada" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Morada Completa *</label>
                    <input type="text" name="morada" id="morada" value="{{ old('morada') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 text-black dark:text-white">
                    @error('morada') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('clientes.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md text-sm font-medium">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md text-sm font-medium shadow-sm">
                        Gravar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>