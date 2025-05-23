 <main class="max-w-4xl mx-auto py-10 px-4">
   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">O que é lógica de programação?</h2>
     <p class="mb-4">Lógica de programação é o conjunto de raciocínios e técnicas que usamos para resolver problemas de forma estruturada com o auxílio de linguagens de programação.</p>
     <p>Aprender lógica é como aprender a pensar como um computador: seguir passos, tomar decisões e repetir ações com precisão.</p>
   </section>

   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">Principais conceitos</h2>
     <ul class="list-disc list-inside space-y-2 mb-4">
       <li><strong>Sequência:</strong> Execução de instruções em ordem.</li>
       <li><strong>Condicional:</strong> Tomada de decisão (ex: if/else).</li>
       <li><strong>Repetição:</strong> Laços para repetir tarefas (ex: for, while).</li>
       <li><strong>Variáveis:</strong> Armazenamento de dados temporários.</li>
       <li><strong>Algoritmos:</strong> Passo a passo lógico para solucionar problemas.</li>
     </ul>
   </section>

   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">Caso de uso real</h2>
     <p class="mb-4">Imagine um caixa eletrônico. Quando você insere o cartão e digita sua senha, o sistema:</p>
     <ul class="list-disc list-inside space-y-2 mb-4">
       <li>Verifica se a senha está correta (condicional)</li>
       <li>Exibe as opções disponíveis (sequência)</li>
       <li>Permite que você repita saques ou consultas (repetição)</li>
       <li>Atualiza o saldo e registra os dados (variáveis)</li>
     </ul>
     <p>Todos esses passos seguem uma lógica de programação. Ao dominar esses fundamentos, você poderá programar qualquer sistema.</p>
   </section>

   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">Condicionais na prática</h2>
     <p class="mb-4">Condicionais permitem que o programa tome decisões com base em determinadas condições.</p>
     <pre class="bg-gray-100 p-4 rounded overflow-auto text-sm mb-4">
      <code>// Verificar se o usuário é maior de idade
        let idade = 18;

        if (idade >= 18) {
          console.log("Você é maior de idade");
        } else {
          console.log("Você é menor de idade");
        }
      </code>
    </pre>
     <p>Esse tipo de verificação é comum em cadastros, validações e sistemas de permissão.</p>
   </section>

   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">Laços de repetição</h2>
     <p class="mb-4">Laços permitem repetir blocos de código várias vezes. Por exemplo, ao exibir uma lista de itens:</p>
     <pre class="bg-gray-100 p-4 rounded overflow-auto text-sm mb-4">
      <code>// Mostrar os 5 primeiros números
      for (let i = 1; i <= 5; i++) {
        console.log("Número: " + i);
      }
      </code>
    </pre>
     <p>Usado para percorrer listas, repetir cálculos ou criar interfaces interativas.</p>
   </section>

   <section class="bg-white rounded-lg shadow p-6 mb-8">
     <h2 class="text-2xl font-semibold text-blue-600 mb-4">Exemplo completo: calculadora de desconto</h2>
     <p class="mb-4">Vamos simular um sistema simples que calcula descontos em uma compra:</p>
     <pre class="bg-gray-100 p-4 rounded overflow-auto text-sm mb-4"><code>let valorCompra = 120;
let desconto = 0;

if (valorCompra >= 100) {
  desconto = 0.1; // 10% de desconto
} else {
  desconto = 0.05; // 5% de desconto
}

let valorFinal = valorCompra - (valorCompra * desconto);
console.log("Valor final com desconto: R$" + valorFinal.toFixed(2));
</code></pre>
     <p>Esse tipo de lógica é usada em sistemas de vendas, e-commerces e promoções.</p>
   </section>
 </main>