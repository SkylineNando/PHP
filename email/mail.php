<?
$mailto= "seu email"; 
$subject = "Titulo do email";
$from="remetente";
$message_body = "mensagem";
mail($mailto,$subject,$message_body,"From:".$from);
echo "O seu e-mail foi enviado com sucesso";
?>
