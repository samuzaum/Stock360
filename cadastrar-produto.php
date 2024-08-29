<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock360";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém e escapa os dados do formulário
$nome = $conn->real_escape_string($_POST['nome']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$quantidade = (int)$_POST['quantidade'];
$unidade = $conn->real_escape_string($_POST['unidade']);
$largura = (float)$_POST['largura'];
$altura = (float)$_POST['altura'];
$profundidade = (float)$_POST['profundidade'];
$descricao = $conn->real_escape_string($_POST['descricao']);
$validade = isset($_POST['validade']) ? $conn->real_escape_string($_POST['validade']) : null; // Verifica se existe
$fornecedor = $conn->real_escape_string($_POST['fornecedor']);
$fileira = (int)$_POST['fileira'];
$preco = (float)$_POST['preco'];

// Prepara a query SQL
$sql = "INSERT INTO produtos (nome, categoria, quantidade, unidade, largura, altura, profundidade, descricao, validade, fornecedor, fileira, preco)
        VALUES ('$nome', '$categoria', $quantidade, '$unidade', $largura, $altura, $profundidade, '$descricao', '$validade', '$fornecedor', $fileira, $preco)";

// Executa a query e prepara a resposta
$response = array();
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Produto cadastrado com sucesso!';
} else {
    $response['status'] = 'error';
    $response['message'] = "Erro: " . $conn->error;
}

// Fecha a conexão
$conn->close();

// Configura o tipo de conteúdo e retorna a resposta JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
