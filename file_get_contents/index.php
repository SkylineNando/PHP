<?php
$url = "https://www.infomoney.com.br/mercados/cambio";
$dadossite = file_get_contents($url);
$var = explode('<td>', $dadossite);
$var2 = explode('>', $var[5]);
echo $var2[0];
?>
