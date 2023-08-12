<?php
if(isset($_POST["submit"])){
    $total_arquivos = count($_FILES["arquivos"]["name"]);
    
    for($i = 0; $i < $total_arquivos; $i++) {
        $nome_arquivo = $_FILES["arquivos"]["name"][$i];
        $tamanho_arquivo = $_FILES["arquivos"]["size"][$i];
        $tipo_arquivo = $_FILES["arquivos"]["type"][$i];
        $tmp_nome = $_FILES["arquivos"]["tmp_name"][$i];
        $erro = $_FILES["arquivos"]["error"][$i];
        
        if($erro == 0){
            // Defina o diretório de destino onde os arquivos serão armazenados
            $diretorio_destino = "uploads/";
            
            // Use a função move_uploaded_file() para mover o arquivo do diretório temporário para o destino
            if(move_uploaded_file($tmp_nome, $diretorio_destino . $nome_arquivo)){
                echo "Arquivo $nome_arquivo enviado com sucesso!<br>";
            } else {
                echo "Erro ao enviar o arquivo $nome_arquivo.<br>";
            }
        } else {
            echo "Erro no upload do arquivo $nome_arquivo.<br>";
        }
    }
}
?>
