<?php
// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'stock360');
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("SELECT id, senha, is_admin FROM usuarios WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Verificar a senha
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $row['id'];

        // Verificar se o usuário é um administrador
        if ($row['is_admin'] == 1) {
            $_SESSION['admin_logged_in'] = true;
            echo "admin"; 
        } else {
            $_SESSION['admin_logged_in'] = false;
            echo "user"; 
        }
    } else {
        echo "Credenciais inválidas.";
    }
} else {
    echo "Credenciais inválidas.";
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
