<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock360";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$nome = $conn->real_escape_string($_POST['nome']);
$categoria = $conn->real_escape_string($_POST['categoria']);
$quantidade = (int)$_POST['quantidade'];
$unidade = $conn->real_escape_string($_POST['unidade']);
$dimensao = $conn->real_escape_string($_POST['dimensao']);
$descricao = $conn->real_escape_string($_POST['descricao']);
$validade = $_POST['validade']; 
$fornecedor = $conn->real_escape_string($_POST['fornecedor']);
$preco = (float)$_POST['preco'];

$sql = "INSERT INTO produtos (nome, categoria, quantidade, unidade, dimensao, descricao, validade, fornecedor, preco)
        VALUES ('$nome', '$categoria', $quantidade, '$unidade', '$dimensao', '$descricao', '$validade', '$fornecedor', $preco)";

$response = array();
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Produto cadastrado com sucesso!';
} else {
    $response['status'] = 'error';
    $response['message'] = "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
