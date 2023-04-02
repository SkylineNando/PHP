<?php
// Definindo o conteúdo completo e o resumo
$texto_completo = "Este é o conteúdo completo que pode ser longo e extenso.";
$texto_resumo = substr($texto_completo, 0, 20) . "...";

// Verifica se o botão 'mostrar mais' foi clicado
if (isset($_POST['mostrar_mais'])) {
    $mostrar_completo = true;
} else {
    $mostrar_completo = false;
}

// Define o texto que deve ser exibido
if ($mostrar_completo) {
    $texto = $texto_completo;
    $botao = "<button type='submit' name='mostrar_menos'>Mostrar menos</button>";
} else {
    $texto = $texto_resumo;
    $botao = "<button type='submit' name='mostrar_mais'>Mostrar mais</button>";
}
?>

<!-- Exibe o conteúdo e o botão -->
<form method="post">
    <p><?php echo $texto; ?></p>
    <?php echo $botao; ?>
</form>


