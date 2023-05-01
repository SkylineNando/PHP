<?php
// Conectar ao banco de dados
include('../conn.php');

// Definir a quantidade de registros por página
$registros_por_pagina = 2;

// Obter o número total de registros
$sql = "SELECT COUNT(*) AS IDGuia FROM guia";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resultado);
$total_registros = $row['IDGuia'];

// Calcular o número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Obter o número da página atual
$pagina_atual = 1;

// Calcular o registro inicial e final
$registro_inicial = ($pagina_atual - 1) * $registros_por_pagina;
$registro_final = $registro_inicial + $registros_por_pagina - 1;

// Executar a consulta SQL
$sql = "SELECT * FROM guia LIMIT $registro_inicial, $registros_por_pagina";
$resultado = mysqli_query($conn, $sql);

// Exibir os resultados
while ($row = mysqli_fetch_assoc($resultado)) {
    // Exibir os dados do registro
    echo $row['IDGuia'];
}

// Exibir a navegação da página
for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
    // Exibir o link para a página
}
?>
