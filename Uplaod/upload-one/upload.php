<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$target_dir = "uploads/"; // diretório onde a imagem será salva
	$nome_imagem = $_POST["nome_imagem"]; // nome da imagem
	$extensao_imagem = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION); // extensão da imagem
	$target_file = $target_dir . $nome_imagem . '.' . $extensao_imagem; // caminho completo do arquivo
	$uploadOk = 1;
	
	// Verifica se o arquivo é uma imagem
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["imagem"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "O arquivo enviado não é uma imagem.";
			$uploadOk = 0;
		}
	}
	
	// Verifica se o arquivo já existe
	if (file_exists($target_file)) {
		echo "Desculpe, o arquivo já existe.";
		$uploadOk = 0;
	}
	
	// Verifica o tamanho do arquivo
	if ($_FILES["imagem"]["size"] > 500000) {
		echo "Desculpe, o arquivo é muito grande.";
		$uploadOk = 0;
	}
	
	// Permite apenas alguns tipos de arquivo
	if($extensao_imagem != "jpg" && $extensao_imagem != "png" && $extensao_imagem != "jpeg"
	&& $extensao_imagem != "gif" ) {
		echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
		$uploadOk = 0;
	}
	
	// Se tudo estiver ok, tenta fazer o upload do arquivo
	if ($uploadOk == 0) {
		echo "Desculpe, o arquivo não pôde ser enviado.";
	} else {
		if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
			echo "O arquivo ". htmlspecialchars($nome_imagem) . '.' . htmlspecialchars($extensao_imagem) . " foi enviado com sucesso.";
		} else {
			echo "Desculpe, ocorreu um erro ao enviar o arquivo.";
		}
	}
}
?>
