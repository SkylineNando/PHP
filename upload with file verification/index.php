<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $aniversario = $_POST["aniversario"];
    $telefone = $_POST["celular"];
    // Outros campos que você possa ter...

    // Processa o upload da imagem
    $targetDir = "../img/";
    $nomeImagemOriginal = basename($_FILES["imagem"]["name"]);
    $extensao = pathinfo($nomeImagemOriginal, PATHINFO_EXTENSION);
    $novoNomeImagem = uniqid('avatar-') . '.' . $extensao;
    $caminhoImagem = $targetDir . $novoNomeImagem;

    include('../conn.php');
    $id = $_SESSION['user_id'];

    // Verifica se já existe uma imagem salva no banco de dados
    $consultaImagem = "SELECT idfoto FROM usuarios WHERE IDTraveler=$id";
    $resultadoConsulta = $conn->query($consultaImagem);
    if ($resultadoConsulta->num_rows > 0) {
        $linha = $resultadoConsulta->fetch_assoc();
        $imagemAntiga = $linha["idfoto"];

        // Exclui a imagem antiga do diretório, se existir
        if ($imagemAntiga !== null && file_exists($targetDir . $imagemAntiga)) {
            unlink($targetDir . $imagemAntiga);
        }
    }

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoImagem)) {
        // Atualiza os dados do usuário no banco de dados
        $sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', aniversario='$aniversario', telefone='$telefone', idfoto='$novoNomeImagem' WHERE IDTraveler=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard/");
        } else {
            echo "Erro ao salvar as alterações: " . $conn->error;
        }
    } else {
        echo "Erro ao carregar a imagem.";
    }

    $conn->close();
}
?>
