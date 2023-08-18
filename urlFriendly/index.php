<?php
if (isset($_GET['usuario'])) {
    $nomeUsuario = $_GET['usuario'];
    
    // Processar o nome do usuário (remover espaços, caracteres especiais, etc.)
    $nomeUsuario = strtolower($nomeUsuario);
    $nomeUsuario = str_replace(" ", "", $nomeUsuario);
    $nomeUsuario = preg_replace('/[^a-z0-9_]/', '', $nomeUsuario);

    // Criar a URL personalizada
    $urlPersonalizada = "@" . $nomeUsuario;
    
    echo "URL personalizada: " . $urlPersonalizada;
} else {
    echo "Nome de usuário não especificado na URL.";
}
?>
