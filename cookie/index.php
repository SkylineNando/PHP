<?php
setcookie("my-cookie", "black", time() + 3600, "/");

if (isset($_COOKIE['my-cookie'])) {
    $valor = $_COOKIE['my-cookie'];
    //Do something with the cookie value
    echo $valor;
}
?>
