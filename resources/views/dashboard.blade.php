<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-900 dark:text-white tracking-tight uppercase">
            📊 Painel de Controlo
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-800 p-6 rounded-xl mb-8 border border-gray-700 shadow-md">
                <h1 class="text-xl font-black text-white uppercase tracking-tight">Bons Negócios Começam Aqui.</h1>
                <p class="text-sm text-gray-400 mt-1">Bem-vindo à plataforma interna de gestão do CESAE. Aqui tem total controlo sobre a carteira de imóveis, angariações de clientes e fecho de transações.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <a href="#grafico-faturacao" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-yellow-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-yellow-400 transition">Faturação Total</p>
                            <h3 class="text-2xl font-black text-white mt-2">€ 1.727.000,00</h3>
                            <p class="text-[10px] text-gray-500 mt-2">Valor acumulado de escrituras</p>
                        </div>
                        <span class="text-xl p-2 bg-yellow-600/10 rounded-lg text-yellow-500">💰</span>
                    </div>
                </a>

                <a href="{{ route('clientes.index', ['filtro' => 'ativos']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-purple-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-purple-400 transition">Clientes Ativos</p>
                            <h3 class="text-2xl font-black text-white mt-2">3</h3>
                            <p class="text-[10px] text-gray-500 mt-2">Compradores com escrituras assinadas</p>
                        </div>
                        <span class="text-xl p-2 bg-purple-600/10 rounded-lg text-purple-500">👥</span>
                    </div>
                </a>

                <a href="{{ route('apartamentos.index', ['estado' => 'Disponível', 'layout' => 'grid']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-green-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-green-400 transition">Stock Disponível</p>
                            <h3 class="text-2xl font-black text-white mt-2">35 <span class="text-xs text-gray-500 font-normal">/ 40</span></h3>
                            <p class="text-[10px] text-gray-500 mt-2">Apartamentos ativos no mercado</p>
                        </div>
                        <span class="text-xl p-2 bg-green-600/10 rounded-lg text-green-500">🏢</span>
                    </div>
                </a>

                <a href="{{ route('apartamentos.index', ['estado' => 'Vendido', 'layout' => 'grid']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-red-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-red-400 transition">Imóveis Vendidos</p>
                            <h3 class="text-2xl font-black text-white mt-2">5</h3>
                            <p class="text-[10px] text-gray-500 mt-2">Transações concluídas com sucesso</p>
                        </div>
                        <span class="text-xl p-2 bg-red-600/10 rounded-lg text-red-500">✅</span>
                    </div>
                </a>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 flex flex-col justify-between">
                    <div>
                        <span class="text-xl">👥</span>
                        <h4 class="text-white font-bold mt-2">Base de Clientes</h4>
                        <p class="text-xs text-gray-400 mt-1">Aceda à listagem completa de compradores e investidores. Registe novos contactos e giria a carteira comercial.</p>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="mt-4 block text-center bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 rounded-lg text-xs uppercase tracking-wider transition">Consultar Clientes</a>
                </div>

                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 flex flex-col justify-between border-l-4 border-l-red-600">
                    <div>
                        <span class="text-xl">🏢</span>
                        <h4 class="text-white font-bold mt-2">Carteira de Imóveis</h4>
                        <p class="text-xs text-gray-400 mt-1">Visualize todos os apartamentos disponíveis no mercado. Controle referências, tipologias, áreas e atualize preços.</p>
                    </div>
                    <a href="{{ route('apartamentos.index') }}" class="mt-4 block text-center bg-red-700 hover:bg-red-800 text-white font-bold py-2 rounded-lg text-xs uppercase tracking-wider transition">Ver Apartamentos</a>
                </div>

                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700 flex flex-col justify-between">
                    <div>
                        <span class="text-xl">🤝</span>
                        <h4 class="text-white font-bold mt-2">Transações</h4>
                        <p class="text-xs text-gray-400 mt-1">Consulte o histórico de escrituras e fecho de negócios. Lance novas vendas e verifique os valores faturados pela agência.</p>
                    </div>
                    <a href="{{ route('vendas.index') }}" class="mt-4 block text-center bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 rounded-lg text-xs uppercase tracking-wider transition">Histórico Comercial</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>