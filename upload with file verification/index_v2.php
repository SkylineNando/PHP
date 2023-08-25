<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/travel/login.php");
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
    $targetDir = "../img/avatars/usuarios/";
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
        if (!$_FILES["imagem"]) {
            // Exclui a imagem antiga do diretório, se existir
            if ($imagemAntiga !== null && file_exists($targetDir . $imagemAntiga)) {
                unlink($targetDir . $imagemAntiga);
            }
        }
    }

    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoImagem)) {
        // Atualiza os dados do usuário no banco de dados
        unlink($targetDir . $imagemAntiga);
        $sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', aniversario='$aniversario', telefone='$telefone', idfoto='$novoNomeImagem' WHERE IDTraveler=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/travel/dashboard/");
        } else {
            echo "Erro ao salvar as alterações: " . $conn->error;
        }
    } else {
        $sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', aniversario='$aniversario', telefone='$telefone' WHERE IDTraveler=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/travel/dashboard/");
        } else {
            echo "Erro ao salvar as alterações: " . $conn->error;
        }
    }

    $conn->close();
}
?>

