<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
                🏢 CESAE IMOBILIÁRIA <span class="text-sm font-normal text-gray-500 lowercase">| painel de controlo</span>
            </h2>
            <div class="flex items-center gap-2 bg-gray-800 border border-gray-700 text-gray-300 font-bold text-xs uppercase px-3 py-1.5 rounded-lg tracking-wider shadow-sm">
    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
    Modo Operacional
</div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-800 border-l-4 border-red-700 rounded-xl p-6 mb-8 shadow-md">
                <h3 class="text-2xl font-black text-white tracking-tight uppercase mb-2">
                    BONS NEGÓCIOS COMEÇAM AQUI.
                </h3>
                <p class="text-gray-400 text-sm">
                    Bem-vindo à plataforma interna de gestão do CESAE. Aqui tem total controlo sobre a carteira de imóveis, angariações de clientes e fecho de transações.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-md transition duration-150 hover:border-green-500">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Faturação Total</span>
                        <span class="text-green-400 text-xl">💰</span>
                    </div>
                    <h3 class="text-2xl font-black text-white">
                        € {{ number_format($faturacaoTotal ?? 0, 2, ',', '.') }}
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">Valor acumulado de escrituras</p>
                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-md transition duration-150 hover:border-blue-500">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Clientes Registados</span>
                        <span class="text-blue-400 text-xl">👥</span>
                    </div>
                    <h3 class="text-2xl font-black text-white">
                        {{ $totalClientes ?? 0 }}
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">Compradores na base de dados</p>
                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-md transition duration-150 hover:border-red-500">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Stock Disponível</span>
                        <span class="text-red-400 text-xl">🏢</span>
                    </div>
                    <h3 class="text-2xl font-black text-white">
                        {{ $imoveisDisponiveis ?? 0 }} <span class="text-sm font-normal text-gray-400">/ {{ $totalImoveis ?? 0 }}</span>
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">Apartamentos ativos no mercado</p>
                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6 shadow-md transition duration-150 hover:border-purple-500">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Imóveis Vendidos</span>
                        <span class="text-purple-400 text-xl">✅</span>
                    </div>
                    <h3 class="text-2xl font-black text-white">
                        {{ $imoveisVendidos ?? 0 }}
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">Transações concluídas com sucesso</p>
                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 rounded-xl p-6 shadow-md border border-gray-700 flex flex-col justify-between">
                    <div>
                        <div class="bg-red-900/30 text-red-500 w-12 h-12 rounded-lg flex items-center justify-center text-xl mb-4">👥</div>
                        <h4 class="text-lg font-bold text-white uppercase mb-2">Base de Clientes</h4>
                        <p class="text-gray-400 text-xs leading-relaxed mb-6">Aceda à listagem completa de compradores e investidores. Registe novos contactos, valide NIFs e gira a carteira comercial.</p>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="block w-full text-center bg-gray-900 hover:bg-gray-700 text-gray-300 font-bold uppercase text-xs tracking-wider py-3 rounded-lg transition duration-150">
                        Consultar Clientes
                    </a>
                </div>

                <div class="bg-gray-800 rounded-xl p-6 shadow-md border border-red-700/50 flex flex-col justify-between relative">
                    <span class="absolute top-3 right-3 bg-red-700 text-white font-bold text-[10px] uppercase px-2 py-0.5 rounded-md tracking-wider">Stock Ativo</span>
                    <div>
                        <div class="bg-red-900/30 text-red-500 w-12 h-12 rounded-lg flex items-center justify-center text-xl mb-4">🏢</div>
                        <h4 class="text-lg font-bold text-white uppercase mb-2">Carteira de Imóveis</h4>
                        <p class="text-gray-400 text-xs leading-relaxed mb-6">Visualize todos os apartamentos disponíveis no mercado. Controle referências, tipologias, áreas e atualize preços de venda.</p>
                    </div>
                    <a href="{{ route('apartamentos.index') }}" class="block w-full text-center bg-red-700 hover:bg-red-800 text-white font-bold uppercase text-xs tracking-wider py-3 rounded-lg transition duration-150">
                        Ver Apartamentos
                    </a>
                </div>

                <div class="bg-gray-800 rounded-xl p-6 shadow-md border border-gray-700 flex flex-col justify-between">
                    <div>
                        <div class="bg-yellow-900/30 text-yellow-500 w-12 h-12 rounded-lg flex items-center justify-center text-xl mb-4">🤝</div>
                        <h4 class="text-lg font-bold text-white uppercase mb-2">Transações</h4>
                        <p class="text-gray-400 text-xs leading-relaxed mb-6">Consulte o histórico de escrituras e fecho de negócios. Lance novas vendas e verifique os valores faturados pela agência.</p>
                    </div>
                    <a href="{{ route('vendas.index') }}" class="block w-full text-center bg-gray-900 hover:bg-gray-700 text-gray-300 font-bold uppercase text-xs tracking-wider py-3 rounded-lg transition duration-150">
                        Histórico Comercial
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>