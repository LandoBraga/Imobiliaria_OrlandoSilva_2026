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

                <button type="button" onclick="openMetaModal()" class="w-full text-left block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-yellow-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-yellow-400 transition">Faturação Total</p>
                            <h3 class="text-2xl font-black text-white mt-2">€ 1.727.000,00</h3>
                            <p class="text-[10px] text-gray-400 mt-2">Clique para ver as metas da agência</p>
                        </div>
                        <span class="text-xl p-2 bg-yellow-600/10 rounded-lg text-yellow-500">💰</span>
                    </div>
                </button>

                <a href="{{ route('clientes.index', ['filtro' => 'ativos']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-purple-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-purple-400 transition">Clientes Ativos</p>
                            <h3 class="text-2xl font-black text-white mt-2">3</h3>
                            <p class="text-[10px] text-gray-400 mt-2">Compradores com escrituras assinadas</p>
                        </div>
                        <span class="text-xl p-2 bg-purple-600/10 rounded-lg text-purple-500">👥</span>
                    </div>
                </a>

                <a href="{{ route('apartamentos.index', ['estado' => 'Disponível', 'layout' => 'grid']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-green-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-green-400 transition">Stock Disponível</p>
                            <h3 class="text-2xl font-black text-white mt-2">35 <span class="text-xs text-gray-500 font-normal">/ 40</span></h3>
                            <p class="text-[10px] text-gray-400 mt-2">Apartamentos ativos no mercado</p>
                        </div>
                        <span class="text-xl p-2 bg-green-600/10 rounded-lg text-green-500">🏢</span>
                    </div>
                </a>

                <a href="{{ route('apartamentos.index', ['estado' => 'Vendido', 'layout' => 'grid']) }}" class="block bg-gray-800 p-5 rounded-xl border border-gray-700 hover:border-blue-600 hover:scale-[1.02] transition duration-150 shadow-md group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider group-hover:text-blue-400 transition">Imóveis Vendidos</p>
                            <h3 class="text-2xl font-black text-white mt-2">5</h3>
                            <p class="text-[10px] text-gray-400 mt-2">Transações concluídas com sucesso</p>
                        </div>
                        <span class="text-xl p-2 bg-blue-600/10 rounded-lg text-blue-500">✅</span>
                    </div>
                </a>

            </div>

            <div class="bg-gray-800 p-6 rounded-xl mb-8 border border-gray-700 shadow-md">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
                    <div>
                        <h3 class="text-lg font-black text-white uppercase tracking-tight">📈 Desempenho Financeiro</h3>
                        <p class="text-xs text-gray-400">Evolução do volume de negócios e faturamento acumulado por mês (Ano Corrente)</p>
                    </div>
                    <span class="text-xs font-bold bg-red-600/20 text-red-400 px-3 py-1 rounded-md border border-red-500/20">
                        Total: € 1.727.000,00
                    </span>
                </div>
                <div class="relative w-full h-72 sm:h-96">
                    <canvas id="graficoFaturacao"></canvas>
                </div>
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

    <div id="metaModal" class="fixed inset-0 z-50 hidden bg-gray-950/80 backdrop-blur-sm flex items-center justify-center p-4 transition duration-300">
        <div class="bg-gray-800 border border-gray-700 rounded-xl max-w-lg w-full p-6 shadow-2xl relative transform scale-95 transition-transform duration-300">
            
            <button onclick="closeMetaModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white transition text-lg">✕</button>
            
            <div class="mb-6">
                <span class="text-2xl">🎯</span>
                <h3 class="text-xl font-black text-white uppercase tracking-tight mt-2">Metas Anuais da Agência</h3>
                <p class="text-xs text-gray-400 mt-0.5">Ano Letivo / Comercial Corrente</p>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center text-xs text-gray-300 font-bold mb-2">
                    <span>Progresso do Objetivo Geral</span>
                    <span class="text-yellow-400">86.3% Atingido</span>
                </div>
                <div class="w-full bg-gray-900 h-4 rounded-full overflow-hidden border border-gray-700">
                    <div class="bg-gradient-to-r from-red-600 to-yellow-500 h-full rounded-full w-[86.3%] shadow-inner"></div>
                </div>
                <div class="flex justify-between text-[10px] text-gray-500 mt-1.5 font-medium">
                    <span>Faturado: € 1.727.000,00</span>
                    <span>Meta Global: € 2.000.000,00</span>
                </div>
            </div>

            <div class="bg-gray-900/50 border border-gray-700 p-4 rounded-lg mb-6 flex justify-between items-center">
                <div>
                    <h5 class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Margem em Falta</h5>
                    <p class="text-lg font-black text-white mt-0.5">€ 273.000,00</p>
                </div>
                <span class="text-xs font-bold bg-green-500/10 text-green-400 border border-green-500/20 px-2.5 py-1 rounded">Dentro do Prazo</span>
            </div>

            <div>
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">🏆 Top Faturação por Agente</h4>
                <div class="space-y-2.5">
                    <div class="flex justify-between items-center bg-gray-900/30 px-3 py-2 rounded border border-gray-700/50">
                        <span class="text-sm font-medium text-white"><span class="text-yellow-500 mr-1.5">🥇</span> Carlos Silva</span>
                        <span class="text-xs font-bold text-gray-300">€ 745.000,00</span>
                    </div>
                    <div class="flex justify-between items-center bg-gray-900/30 px-3 py-2 rounded border border-gray-700/50">
                        <span class="text-sm font-medium text-white"><span class="text-gray-400 mr-1.5">🥈</span> Ana Martins</span>
                        <span class="text-xs font-bold text-gray-300">€ 582.000,00</span>
                    </div>
                    <div class="flex justify-between items-center bg-gray-900/30 px-3 py-2 rounded border border-gray-700/50">
                        <span class="text-sm font-medium text-white"><span class="text-amber-600 mr-1.5">🥉</span> Ricardo Santos</span>
                        <span class="text-xs font-bold text-gray-300">€ 400.000,00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Funções de Controlo do Modal de Metas
        function openMetaModal() {
            const modal = document.getElementById('metaModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
            }, 10);
        }

        function closeMetaModal() {
            const modal = document.getElementById('metaModal');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 150);
        }

        // Configuração do Gráfico de Linhas (Fixo na Página)
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('graficoFaturacao').getContext('2d');
            const gradient = ctx.createLinearGradient(0, 0, 0, 350);
            gradient.addColorStop(0, 'rgba(185, 28, 28, 0.4)');  
            gradient.addColorStop(1, 'rgba(185, 28, 28, 0.0)');  

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    datasets: [{
                        label: 'Faturação Mensal (€)',
                        data: [140000, 295000, 185000, 420000, 310000, 387000, 0, 0, 0, 0, 0, 0], 
                        borderColor: '#dc2626', 
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#dc2626',
                        pointHoverRadius: 7,
                        pointRadius: 4,
                        fill: true,
                        backgroundColor: gradient,
                        tension: 0.35 
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.parsed.y.toLocaleString('pt-PT', { style: 'currency', currency: 'EUR' });
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { color: '#9ca3af' }
                        },
                        y: {
                            grid: { color: 'rgba(75, 85, 99, 0.2)' },
                            ticks: {
                                color: '#9ca3af',
                                callback: function(value) { return '€ ' + (value / 1000) + 'k'; }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>