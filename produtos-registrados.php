<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock360";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Definindo a consulta SQL
$sql = "SELECT nome, categoria, quantidade, unidade, largura, altura, profundidade, descricao, validade, fornecedor, fileira, preco FROM produtos";

// Executando a consulta
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Inserindo cada produto como uma linha na tabela
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['nome']) . "</td>
                    <td>" . htmlspecialchars($row['categoria']) . "</td>
                    <td>" . htmlspecialchars($row['quantidade']) . "</td>
                    <td>" . htmlspecialchars($row['unidade']) . "</td>
                    <td>" . number_format($row['largura'], 2, ',', '.') . " x " .
                              number_format($row['altura'], 2, ',', '.') . " x " .
                              number_format($row['profundidade'], 2, ',', '.') . "</td>
                    <td>" . htmlspecialchars($row['descricao']) . "</td>
                    <td>" . htmlspecialchars($row['validade']) . "</td>
                    <td>" . htmlspecialchars($row['fornecedor']) . "</td>
                    <td>" . htmlspecialchars($row['fileira']) . "</td>
                    <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Nenhum produto encontrado.</td></tr>";
    }
} else {
    echo "<tr><td colspan='10'>Erro ao executar a consulta: " . $conn->error . "</td></tr>";
}

// Fechando a conexão
$conn->close();
?>
