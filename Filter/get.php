<?php
include('../../conn.php');

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta base para selecionar todos os eventos
$sql = "SELECT * FROM agenda";

// Verifica se a cidade foi especificada via método GET
if (isset($_GET['cidade'])) {
    // Sanitize a cidade selecionada (importante para evitar SQL injection)
    $cidade = $conn->real_escape_string($_GET['cidade']);

    // Se a cidade não for "Todos", ajuste a consulta para filtrar pela cidade
    if ($cidade !== "Todos") {
        $sql .= " WHERE cidade = '$cidade'";
    }
}

// Executa a consulta
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    echo "Erro na consulta: " . $conn->error;
} else {
    // Loop para exibir os resultados
    while ($row = $result->fetch_assoc()) {
        // Exibe os resultados, substitua pelas suas colunas reais
        echo "Nome do evento: " . $row["Nome"] . " - Cidade: " . $row["Cidade"] . "<br>";
    }

    // Fecha o resultado
    $result->close();
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filtrar por Cidade</title>
</head>
<body>
    <h2>Filtrar Eventos por Cidade</h2>
    <form method="get" action="">
        <label for="cidade">Selecione uma cidade:</label>
        <select id="cidade" name="cidade">
            <option value="Todos">Todos</option>
            <option value="Alto Paraiso de Goiás">Alto Paraiso de Goiás</option>
            <option value="Cavalcante">Cavalcante</option>
            <!-- Adicione as opções restantes -->
        </select>
        <input type="submit" value="Filtrar">
    </form>
</body>
</html>
