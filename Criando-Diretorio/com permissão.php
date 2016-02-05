//Criando diretórios com permissão de escrita
<?php
umask(0); mkdir("nome_da_pasta", 0777, true);
?>
