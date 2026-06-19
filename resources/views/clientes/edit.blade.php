<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
            ✏️ Editar Cliente: {{ $cliente->nome }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 shadow-sm">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700 text-white">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Nome Completo</label>
                        <input type="text" name="nome" value="{{ old('nome', $cliente->nome) }}" required
                            class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $cliente->email) }}" required
                                class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500">
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-1">Telefone</label>
                            <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required
                                class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-400 text-sm font-medium mb-1">NIF (Contribuinte)</label>
                        <input type="text" name="nif" value="{{ old('nif', $cliente->nif) }}" required maxlength="9"
                            class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500 font-mono">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-400 text-sm font-medium mb-1">Localização (Morada)</label>
                        <input type="text" name="morada" value="{{ old('morada', $cliente->morada) }}" required
                            class="w-full bg-gray-900 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div class="flex justify-end gap-3 border-t border-gray-700 pt-4">
                        <a href="{{ route('clientes.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium px-4 py-2 rounded text-sm transition duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded text-sm transition duration-150">
                            Gravar Alterações
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>