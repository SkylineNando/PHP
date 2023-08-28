                <?php
                // Conexão com o banco de dados (substitua pelas suas configurações)
                include('../conn.php');

                // ID atual (você deve obter isso de alguma forma, por exemplo, via parâmetro na URL)
                $currentItemId = isset($_GET['v']) ? $_GET['v'] : '';

                // Busque os detalhes do item atual no banco de dados
                $sql = "SELECT * FROM blog WHERE idBlog = '$currentItemId'";
                $result = $conn->query($sql);

                $currentItem = $result->fetch_assoc();

                // Verificar se há uma página anterior e próxima
                $previousPageId = null;
                $nextPageId = null;

                function quebra_linha($texto, $limite = 50) {
                  $palavras = explode(' ', $texto);
                  $linhas = array();
                  $linha_atual = "";
                  
                  foreach ($palavras as $palavra) {
                      if (strlen($linha_atual) + strlen($palavra) <= $limite) {
                          $linha_atual .= $palavra . " ";
                      } else {
                          $linhas[] = trim($linha_atual);
                          $linha_atual = $palavra . " ";
                      }
                  }
                  
                  $linhas[] = trim($linha_atual);
                  return implode("<br>", $linhas);
              }
              function quebra_linha_next($texto, $limite = 50) {
                $palavras = explode(' ', $texto);
                $linhas = array();
                $linha_atual = "";
                
                foreach ($palavras as $palavra) {
                    if (strlen($linha_atual) + strlen($palavra) <= $limite) {
                        $linha_atual .= $palavra . " ";
                    } else {
                        $linhas[] = trim($linha_atual);
                        $linha_atual = $palavra . " ";
                    }
                }
                
                $linhas[] = trim($linha_atual);
                return implode("<br>", $linhas);
            }

                // Buscar IDs de itens anteriores e próximos
                $sqlPrevious = "SELECT idBlog, Titulo FROM blog WHERE idBlog  < $currentItemId ORDER BY idBlog  DESC LIMIT 1";
                $resultPrevious = $conn->query($sqlPrevious);

                if ($resultPrevious->num_rows > 0) {
                    $row = $resultPrevious->fetch_assoc();
                    $previousPageId = $row['idBlog'];
                    $texto = $row['Titulo'];
                    $prevtitulo  = quebra_linha($texto, 28);
                    
                }

                $sqlNext = "SELECT idBlog, Titulo FROM blog WHERE idBlog > $currentItemId ORDER BY idBlog ASC LIMIT 1";
                $resultNext = $conn->query($sqlNext);

                if ($resultNext->num_rows > 0) {
                    $row_next = $resultNext->fetch_assoc();
                    $nextPageId = $row_next['idBlog'];
                    $nexttitulo = $row_next['Titulo'];
                    $texto = $row_next['Titulo'];
                    $nexttitulo = quebra_linha_next($texto, 28);
                }

              

              

                $conn->close();


                if ($previousPageId !== null){
                  echo"
                  <div class='col-auto'>
                    <a href='home.php?v=$previousPageId' class=''>
                      <div class='d-flex items-center'>
                        <div class='icon-arrow-left text-20 mr-20'></div>
                        <div class='text-18 fw-500'>Anterior</div>
                      </div>
                      <div class='text-15 ml-40'> $prevtitulo </div>
                    </a>
                  </div>";
                }else{
                  echo"
                  <div class='col-auto'>
                    <a href='home.php?v=$previousPageId' class=''>
                    <div class='d-flex items-center'>
                      <div class='text-18 fw-500'></div>
                    </div>
                    <div class='text-15 ml-40'></div>
                  </a>
                  </div>";
                }

                if($previousPageId == null or $nextPageId  == null){

                }else{
                  
                  echo"
                  <div class='col-auto'>
                    <img src='img/general/menu.svg' alt='image' class='pt-20'>
                  </div>";
                }


                if ($nextPageId !== null){

                  echo"
                  <div class='col-auto text-right'>
                    <a href='home.php?v=$nextPageId' class=''>
                      <div class='d-flex items-center justify-end'>
                        <div class='text-18 fw-500'>Próximo</div>
                        <div class='icon-arrow-right text-20 ml-20'></div>
                      </div>
                      <div class='text-15 mr-40'>$nexttitulo</div>
                    </a>
                  </div>";
  
                }else{

                  echo"
                  <div class='col-auto text-right'>
                  </div>";
  
                }

                ?>
