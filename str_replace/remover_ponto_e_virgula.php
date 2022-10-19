<?php
$numero = "1.000,00";
$result = str_replace(['.',','],'', $numero);
echo $result;
?>
