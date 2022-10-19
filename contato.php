<?php
//PHPmailer
require_once __DIR__.'/lib/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){

//Variaveis com os dados
$email = $_POST['email'];
$nome = $_POST['nome'];
$texto = $_POST['texto'];

//Instanciando a váriavel do email  
$mail = new PHPMailer(true);     //Instancia do PHPmailer

//Fazendo a ligação do email
try {
    //Configurações do servidor (gmail)
    
    $mail->isSMTP();      
    $mail->SMTPSecure = 'tls';                                  //Enviar usando TLS
    $mail->Host       = 'smtp.gmail.com';                     //Servidor usado
    $mail->SMTPAuth   = true;                                   //Ativando autenticacao SMTP
    $mail->Username   = 'SEU EMAIL';                     //Usuario SMTP
    $mail->Password   = 'SUA SENHA DO EMAIL';                               //Senha SMTP     
    $mail->Port       = 587;        //Porta usada para TLS

    //Aqui ele tira o erro do SSL e da conexão com o Host
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    
    //quem envia e recebe
    $mail->setFrom($email,$nome);  //Usuario SMTP e Nome aleatório
    $mail->addAddress('SEU EMAIL');     //Email do Destinatario
    $mail->isHTML(true);                                  //Habilitando o uso do HTML
    $mail->charset = 'UTF-8';
    $mail->Subject = "SUPORTE $email";    //Titulo
    $mail->Body    = "Nome: $nome<br>Email: $email<br>Mensagem: $texto";
    $mail->AltBody =  "Nome: $nome<br>Email: $email<br>Mensagem: $texto";
    $mail->send();
    header('refresh:3;url=index.html');
    
} catch (Exception $e) {
    echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o
    header('refresh:2;url=contato.html');
}
}else{
    echo 'Por favor, preencha os campos para entrar em contato!';
    header('refresh:2;url=contato.html');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Modal JS do sweet -->
<script src="scripts/sweetalert2.js"></script>
<script src="scripts/custom2.js"></script>
</body>
</html>