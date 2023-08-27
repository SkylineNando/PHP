<?php
session_start();

include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    $commentId = $_POST["comment_id"];
    $action = $_POST["action"];
    $userId = $_SESSION["user_id"];

    // Verifique se o usuário já avaliou este comentário
    $checkQuery = "SELECT * FROM ratings WHERE comment_id = '$commentId' AND user_id = '$userId'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        $previousAction = $checkResult->fetch_assoc()["acao"];
        
        if ($previousAction !== $action) {
            // A nova ação é diferente da anterior, atualize a ação da avaliação existente
            $updateQuery = "UPDATE ratings SET acao = '$action' WHERE comment_id = '$commentId' AND user_id = '$userId'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "Ação da avaliação atualizada com sucesso.";
            } else {
                echo "Erro ao atualizar a ação da avaliação: " . $conn->error;
                exit;
            }
        } else {
            // A nova ação é a mesma da anterior, exclua a avaliação
            $deleteQuery = "DELETE FROM ratings WHERE comment_id = '$commentId' AND user_id = '$userId'";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "Avaliação removida.";
            } else {
                echo "Erro ao remover a avaliação: " . $conn->error;
                exit;
            }
        }
    } else {
        // Caso contrário, insira uma nova avaliação no banco de dados
        $insertQuery = "INSERT INTO ratings (comment_id, acao, user_id) VALUES ('$commentId', '$action', '$userId')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Avaliação salva com sucesso.";
        } else {
            echo "Erro ao salvar a avaliação: " . $conn->error;
        }
    }
}

$conn->close();
?>
