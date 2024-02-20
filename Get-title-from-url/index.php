<?php
// Função para obter o título da página a partir de uma URL
function obterTituloDaPagina($url) {
    // Fazer uma solicitação HTTP para obter o conteúdo da página
    $html = file_get_contents($url);
    
    // Procurar pela tag meta com property="og:title"
    preg_match('/<meta\s+property="og:title"\s+content="([^"]+)"\s*\/?>/i', $html, $matches);
    
    if (isset($matches[1])) {
        // Retornar o título encontrado
        return $matches[1];
    } else {
        // Se o título não for encontrado, tentar extrair o título da própria página
        preg_match('/<title>(.*?)<\/title>/i', $html, $matches);
        if (isset($matches[1])) {
            return $matches[1];
        } else {
            // Caso não seja encontrado o título na tag meta ou no elemento title, retornar o nome do site
            return 'Nome do Site';
        }
    }
}

// Exemplo de uso
$url = 'https://www.decolar.com/';
$titulo = obterTituloDaPagina($url);
echo $titulo;
?>
