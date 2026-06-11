<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                <span class="text-red-600 font-extrabold">CESAE</span> Imobiliária <span class="text-sm font-light text-gray-500 lowercase">| painel de controlo</span>
            </h2>
            <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider bg-red-600 text-white rounded-full animate-pulse">
                Modo Operacional
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border-t-8 border-red-600 p-8 mb-8">
                <h1 class="text-3xl font-black text-gray-900 dark:text-white uppercase tracking-tight">
                    Bons negócios começam aqui.
                </h1>
                <p class="text-base text-gray-600 dark:text-gray-400 mt-2 max-w-2xl">
                    Bem-vindo à plataforma interna de gestão do CESAE. Aqui tem total controlo sobre a carteira de imóveis, angariações de clientes e fecho de transações.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col justify-between border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-md bg-gray-900 dark:bg-red-600 flex items-center justify-center text-xl mb-4 shadow-md">
                            <span class="text-white font-bold">👥</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 dark:text-white uppercase tracking-tight">
                            Base de Clientes
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 leading-relaxed">
                            Aceda à listagem completa de compradores e investidores. Registe novos contactos, valide NIFs e gira a carteira comercial.
                        </p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('clientes.index') }}" class="w-full text-center inline-block px-4 py-2_5 bg-gray-900 hover:bg-red-600 text-white font-bold uppercase text-xs tracking-wider rounded transition-colors duration-200 shadow">
                            Consultar Clientes
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col justify-between border-2 border-red-600 relative">
                    <span class="absolute top-0 right-0 bg-red-600 text-white font-black text-[10px] uppercase tracking-widest px-3 py-1 rounded-bl">
                        Stock Ativo
                    </span>
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-md bg-red-600 flex items-center justify-center text-xl mb-4 shadow-md">
                            <span class="text-white font-bold">🏢</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 dark:text-white uppercase tracking-tight">
                            Carteira de Imóveis
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 leading-relaxed">
                            Visualize todos os apartamentos disponíveis no mercado. Controle referências, tipologias, áreas e atualize preços de venda.
                        </p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('apartamentos.index') }}" class="w-full text-center inline-block px-4 py-2_5 bg-red-600 hover:bg-red-700 text-white font-bold uppercase text-xs tracking-wider rounded transition-colors duration-200 shadow">
                            Ver Apartamentos
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col justify-between border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <div class="w-12 h-12 rounded-md bg-gray-900 dark:bg-red-600 flex items-center justify-center text-xl mb-4 shadow-md">
                            <span class="text-white font-bold">🤝</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 dark:text-white uppercase tracking-tight">
                            Transações
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 leading-relaxed">
                            Consulte o histórico de escrituras e fecho de negócios. Lance novas vendas e verifique os valores faturados pela agência.
                        </p>
                    </div>
                    <div class="p-6 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('vendas.index') }}" class="w-full text-center inline-block px-4 py-2_5 bg-gray-900 hover:bg-red-600 text-white font-bold uppercase text-xs tracking-wider rounded transition-colors duration-200 shadow">
                            Histórico Comercial
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>