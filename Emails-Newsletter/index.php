<?php
require 'vendor/autoload.php'; // Carrega o PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configurações do servidor de e-mail
$mail = new PHPMailer(true);

try {
    // Configurações do servidor de e-mail
    $mail->isSMTP();
    $mail->Host       = 'smtp.seuservidor.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'seu_email@dominio.com';
    $mail->Password   = 'sua_senha';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configurações de envio
    $mail->setFrom('seu_email@dominio.com', 'Seu Nome');
    $mail->isHTML(true);

    // Conexão com o banco de dados
    $db_host = 'localhost';
    $db_user = 'seu_usuario';
    $db_pass = 'sua_senha';
    $db_name = 'seu_banco_de_dados';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Seleciona os destinatários do banco de dados
    $query = "SELECT email, nome FROM destinatarios WHERE status = 'ativo' LIMIT 100"; // Limite diário de 100 e-mails
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
        $nome = $row['nome'];

        $mail->addAddress($email, $nome);
        $mail->Subject = 'Assunto do E-mail';
        $mail->Body = 'Conteúdo do E-mail';

        $mail->send();

        $mail->clearAddresses(); // Limpa os destinatários para o próximo loop
        sleep(2); // Evita sobrecarregar o servidor de e-mail e respeita limites

        // Marca o destinatário como "enviado" no banco de dados
        $conn->query("UPDATE destinatarios SET status = 'enviado' WHERE email = '$email'");
    }

    echo 'E-mails enviados com sucesso!';
} catch (Exception $e) {
    echo "Erro no envio do e-mail: {$mail->ErrorInfo}";
}

$conn->close();
?>
