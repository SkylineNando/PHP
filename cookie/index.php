<?php
setcookie("my-cookie", "black", time() + 3600, "/");

if (isset($_COOKIE['my-cookie'])) {
    $valor = $_COOKIE['my-cookie'];
    // Faça algo com o valor do cookie
    echo $valor;
}
?>
