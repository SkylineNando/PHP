<?php
$a = 8;
$b = 3;
$i = 1;
while ($i <= $a or $i <= $b) {
    if($a >= $i){
        $i = $i;
        echo "a".$i."<br>";
    }
    if($b >= $i){
        $i = $i;
        echo "b".$i."<br>";
    }    
    $i++;
}
?>
