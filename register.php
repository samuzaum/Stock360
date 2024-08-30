<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'stock360');

// Verificar conexão
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Iniciar a sessão (opcional, dependendo dos requisitos)
session_start();

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegar os dados do formulário e sanitizar
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = $_POST['password'];

    // Validar o email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Email inválido']);
        exit;
    }

    // Hash da senha
    $hashedSenha = password_hash($senha, PASSWORD_BCRYPT);

    // Preparar a consulta para verificação de e-mail duplicado
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email já existe
        echo json_encode(['status' => 'error', 'message' => 'Email já está em uso']);
        $stmt->close();
        $conn->close();
        exit;
    }

    // Fechar a consulta de verificação
    $stmt->close();

    // Preparar a consulta para inserção
    $stmt = $conn->prepare("INSERT INTO usuarios (username, email, senha) VALUES (?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'Preparação da consulta falhou: ' . $conn->error]);
        exit;
    }
    $stmt->bind_param('sss', $username, $email, $hashedSenha);

    // Executar a consulta
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>
