# 🏢 Plataforma Digital de Gestão Imobiliária - CESAE

Plataforma Web para gestão integrada de stock imobiliário, angariação de clientes e faturação analítica, desenvolvida como projeto de avaliação final no ecossistema **Laravel 11**, **PHP** e **MySQL**.

---

## 📑 Matriz de Conformidade de Requisitos (CESAE)

O sistema cumpre com rigor todos os critérios obrigatórios estabelecidos no enunciado de avaliação:

| Requisito de Avaliação | Componente Laravel | Descrição da Implementação | Estado |
| :--- | :--- | :--- | :---: |
| **CRUD Completo** | `Models`, `Controllers` & `Blade` | Gestão total (Criar, Ler, Editar, Eliminar) para Clientes, Apartamentos e Vendas. | ✅ |
| **Arquitetura Estrutural** | `MVC` Pattern & `Migrations` | Base de dados MySQL gerada por Migrations. Views isoladas com Blade e Vite. | ✅ |
| **Validação de Formulários** | HTTP Requests / `validate()` | Proteção contra dados nulos, formatos inválidos e validação exclusiva de NIF/Email. | ✅ |
| **Upload de Fotografias** | Storage System | Upload seguro via `multipart/form-data` guardado em `storage/app/public/apartamentos`. | ✅ |
| **Pesquisa e Ordenação** | Eloquent Queries Dinâmicas | Filtros em tempo real por tipologia, limites de preço e ordenações ascendentes/descendentes. | ✅ |
| **Mensagens de Feedback** | Blade Sessions | Alertas visuais estilizados injetados no topo das listagens após operações com sucesso. | ✅ |
| **Bloqueio de Duplicação** | Backend Validation Logic | Restrição lógica que impede a venda ou edição de imóveis já marcados como "Vendido". | ✅ |
| **Massa de Dados de Teste** | Database `Seeders` & `Factories` | Alimentação automática de tabelas com dados realistas usando o componente `Faker`. | ✅ |

---

## 🚀 Otimizações Visuais & Engenharia de Interface (UX/UI)

Para além dos requisitos obrigatórios, foram integradas melhorias avançadas de usabilidade:

1. **Dashboard Analítico Dinâmico:** Incorporação da biblioteca *Chart.js* na página principal para plotagem de séries temporais do volume de negócios e faturação global.
2. **Gamificação e Metas Corporativas:** Ao clicar no KPI de Faturação, é disparado um *Modal* nativo em Tailwind CSS (com efeito `backdrop-blur-sm`) que exibe a barra de progresso dos objetivos anuais da agência e o pódio dos melhores consultores.
3. **Refatoração de Acessibilidade (A11y):** Correção do rácio de contraste nos cartões analíticos do Dashboard, elevando os textos de apoio para a classe `text-gray-400` para uma leitura confortável em ambientes escuros (*Dark Mode*).
4. **Tratamento Condicional de Imóveis Vendidos:** Os ativos comercializados passam automaticamente para um estado visual esbatido (`opacity-35` e `mix-blend-luminosity`) e o controlo de edição é removido para garantir a proteção histórica dos dados.
5. **Filtragem Cruzada de Clientes:** Implementação de cartões âncora clicáveis que intercetam parâmetros HTTP e segmentam instantaneamente os compradores em "Clientes Ativos" (`has('vendas')`) e "Em Prospeção" (`doesntHave('vendas')`).

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 8.2+ / Laravel 11
* **Frontend:** Blade Templates / Tailwind CSS / Vite
* **Base de Dados:** MySQL
* **Gráficos & Interatividade:** Chart.js / JavaScript Asíncrono
* **Autenticação:** Laravel Breeze (`auth` middleware)

---

## 👥 Autoria
* **Formando:** Orlando Silva
* **Formador:** Rui Guerra
* **Curso:** Desenvolvimento de Software / Aplicações Web - CESAE (2026)