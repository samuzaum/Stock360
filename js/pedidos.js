function aumentarNumero() {
    let quantidadeInput = document.getElementById('quantidade-pedidos-input');

    // Converte o valor atual para um número inteiro
    let quantidadeAtual = parseInt(quantidadeInput.value, 10);

    // Incrementa o valor atual
    quantidadeAtual++;

    // Atualiza o campo com o novo valor
    quantidadeInput.value = quantidadeAtual;
}

function diminuirNumero() {
    let quantidadeInput = document.getElementById('quantidade-pedidos-input');
    let quantidadeAtual = parseInt(quantidadeInput.value, 10);

    if(quantidadeAtual == 0){
        quantidadeAtual = 0
    }else {
    quantidadeAtual--;
    quantidadeInput.value = quantidadeAtual;
    }
}
function limparFormulario() {
    document.querySelector('.pesquisa-pedidos input').value = '';
    document.getElementById('quantidade-pedidos-input').value = 0;
    document.getElementById('observacoes-pedidos').value = '';
    document.getElementById('nome-pedidos').value = '';
 }

 function notificacaoPedidos(event){
    event.preventDefault();
    let div = document.getElementById('notificacao-pedidos')
    let paragrafo = document.createElement('p');
    paragrafo.textContent = 'Salvo com sucesso!';
    div.innerHTML = '';
    div.appendChild(paragrafo);
    
    div.style.display = 'block';
    
    div.classList.add('mostrar');

    setTimeout(() => {
        div.classList.remove('mostrar');
    }, 2000);
    

 }