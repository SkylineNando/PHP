<?php 
$name = "Ana Maria da Silva";
$string = explode(" ", $name );
$last_word = end($string);
$arr = explode(' ',trim($name));
echo $arr[0].' '.$last_word;
?>
