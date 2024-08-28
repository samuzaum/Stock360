<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock360";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT nome, categoria, quantidade, unidade, dimensao, descricao, validade, fornecedor, preco FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inserindo cada produto como uma linha na tabela
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nome']}</td>
                <td>{$row['categoria']}</td>
                <td>{$row['quantidade']}</td>
                <td>{$row['unidade']}</td>
                <td>{$row['dimensao']}</td>
                <td>{$row['descricao']}</td>
                <td>{$row['validade']}</td>
                <td>{$row['fornecedor']}</td>
                <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9'>Nenhum produto encontrado.</td></tr>";
}

$conn->close();
?>