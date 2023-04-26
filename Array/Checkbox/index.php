<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $checkbox_values = isset($_POST['tipotur']) ? $_POST['tipotur'] : array();
    foreach ($checkbox_values as $valor) {
    echo $valor . "<br>";
    }

}
?>
