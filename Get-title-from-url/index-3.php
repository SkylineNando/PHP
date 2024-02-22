<?php

// Função para obter o título da página a partir de uma URL
function obterTituloDaPagina($url) {
  try {
      // Configuração do contexto do stream para definir opções de requisição
      $context = stream_context_create(array(
          'http' => array(
              'timeout' => 10, // Tempo limite da requisição em segundos
              'header'  => 'User-Agent: Mozilla/5.0', // Cabeçalho User-Agent para simular um navegador
          ),
      ));

      // Fazer uma solicitação HTTP para obter o conteúdo da página
      $html = @file_get_contents($url, false, $context);

      if ($html === false) {
          // Se a solicitação HTTP falhar, lançar uma exceção
          throw new Exception('Erro ao fazer a solicitação HTTP');
      }

      // Extrair o nome do domínio da URL
      $domain = parse_url($url, PHP_URL_HOST);

      // Remover todos os elementos do conteúdo HTML que não pertencem ao domínio principal
      $html = preg_replace('/<a\s+(?:[^>]*?\s+)?href=(?:"|\')(?!https?:\/\/(?:www\.)?' . preg_quote($domain) . ')(?:[^"\'\s]+)(?:"|\')([^>]*?)>/i', '', $html);

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
              // Caso não seja encontrado o título na tag meta ou no elemento title, retornar "Título não encontrado"
              // Extrair apenas o endereço principal
              $host = parse_url($url, PHP_URL_HOST);
              return  $host;
          }
      }
  } catch (Exception $e) {
      // Se ocorrer um erro, retornar "Título não encontrado 2"
      // Extrair apenas o endereço principal
      $host = parse_url($url, PHP_URL_HOST);
      return  $host;
  }
}
?>
