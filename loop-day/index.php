<?php
// Defina a data atual
$data_atual = new DateTime();

// Defina a data inicial do loop
$data_inicial = new DateTime('2023-04-01');

// Calcule a diferença entre as datas em dias
$dias = $data_inicial->diff($data_atual)->days;

// Calcule o índice do dia atual no loop
$indice = ($dias % 20) + 1;

// Defina um array com as informações a serem exibidas
$informacoes = array(
    "Informação 1",
    "Informação 2",
    "Informação 3",
    "Informação 4",
    "Informação 5",
    "Informação 6",
    "Informação 7",
    "Informação 8",
    "Informação 9",
    "Informação 10",
    "Informação 11",
    "Informação 12",
    "Informação 13",
    "Informação 14",
    "Informação 15",
    "Informação 16",
    "Informação 17",
    "Informação 18",
    "Informação 19",
    "Informação 20",
    // Adicione mais informações aqui se necessário
);

// Exiba a informação correspondente ao índice do dia atual
echo $informacoes[$indice - 2];

?>
