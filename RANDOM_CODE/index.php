<?php
  $codprimary = strtoupper(substr(bin2hex(random_bytes(8)), 1));
  echo $codprimary.'<br>';
  $codsecundary = strtoupper(substr(bin2hex(random_bytes(2)), 1));
  echo $codsecundary.'<br>';
  $cod1 = substr($codprimary, 0,2).'-';
  $cod2 = substr($codprimary, 2,6).'-';
  $cod3 = substr($codprimary, 8,3).'-';
  $cod4 = substr($codprimary, 11,4).'-';
  $cod5 = substr($codsecundary , 0,3);
  $cod = $cod1.$cod2.$cod3.$cod4.$cod5;
  echo $cod;
?>
