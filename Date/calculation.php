<?php
// Tipo de fuso horario
	date_default_timezone_set('America/Sao_Paulo');
  
  $d1 = date('Y/m/d');
	$d2= date('Y/m/d', strtotime('+3 days'));
  
// transforma a data do formato BR para o formato americano, ANO-MES-DIA
	$data1 = implode('-', array_reverse(explode('/', $d1)));
	$data2 = implode('-', array_reverse(explode('/', $d2)));

	// converte as datas para o formato timestamp
	$d1 = strtotime($data1); 
	$d2 = strtotime($data2);
	// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
	$DF = ($d2 - $d1) /86400;
  
  echo $DF;
  
  ?>
