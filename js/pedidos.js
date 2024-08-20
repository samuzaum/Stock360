function aumentarNumero() {
    let quantidadeInput = document.getElementById('quantidade-pedidos-input');
    let quantidadeAtual = parseInt(quantidadeInput.value, 10);
    quantidadeAtual++;
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
 