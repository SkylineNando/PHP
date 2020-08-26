<?php
$filetxt = fopen('file.txt','w');
if ($filetxt == false) die('Não foi possível criar o arquivo.');
$text = "Hello  World!";
fwrite($filetxt, $text);
fclose($filetxt);
?>
