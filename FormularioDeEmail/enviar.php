<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>enviar</title>
</head>

<body>
<?
$hoje_tmp = getdate();
$hoje = ($hoje_tmp[hours].":".$hoje_tmp[minutes].":".$hoje_tmp[seconds]);

$nome = $_POST["nome"]; //trata a variável nome
$cidade = $_POST["cidade"]; //trata a variável cidade
$estado = $_POST["estado"]; //trata a variável estado
$telefone = $_POST[telefone];
$email = $_POST["e-mail"]; //trata a variável e-mail

global $email; //transforma em variavel global a variável e-mail

$enviou = mail("SEU EMAIL", // aqui voce coloca o seu e-mail
"$assunto_mensagem",
"Mensagem enviada para você
Nome: $nome
Cidade: $cidade
Estado: $estado
Telefone:$telefone
E-mail: $email",
"From: $email <$nome>");

if ($enviou){
echo "<b>$nome</b>, Cadastrado com sucesso.<br>";
}

else {
echo "<b>$nome</b>, Não foi possível efetuar seu cadastro.<br>Tente novamente.";
}
?>
</body>
</html>
