<?php
$senha = 123;

$hast = password_hash('1243', PASSWORD_DEFAULT);

if(password_verify($senha, $hast)){
    echo "ok";
}else{
    echo "erro";
}

?>
