  <?php
  session_start();
  include_once 'connect.php';
	
  $nameCost = isset($_POST['nameCost']) ? $_POST['nameCost']: '' ;
  $dateCost = isset($_POST['dCost']) ? $_POST['dCost']: '' ;
  $valueCost = isset($_POST['vCost']) ? $_POST['vCost']: '';
  $typeCost = isset($_POST['typeCost']) ? $_POST['typeCost']: '';
  
  mysqli_query($conn, "INSERT INTO `cost` (`idCost`, `nameCost`, `dateCost`, `valueCost`, `typeCost`) VALUES (NULL, '$nameCost', '$dateCost', '$valueCost', '$typeCost')");
	//Inserir dados 
    if(mysqli_affected_rows($conn) == 1){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
       echo 'Custo adicionado com sucesso!', $conn->error;
	}
	else {
            echo "Erro, não possível inserir no banco de dados", $conn->error;
    }
    mysqli_close($conn); //fecha conexão com banco de dados 
?>
