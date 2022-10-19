<?php

//Conectando com o banco de dados
require "conexao.php";

require_once __DIR__. '/lib/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $mail->Password   = 'SUA SENHA DO EMAIL';                           //Senha SMTP     
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
    $mail->setFrom('SEU EMAIL', 'NOME');  //Usuario SMTP e Nome aleatório
    $mail->addAddress($email);     //Email do Destinatario
    $mail->isHTML(true);  //Habilitando o uso do HTML
    $mail->charset = 'UTF-8';
    $mail->Subject = 'PAGAMENTO REALIZADO';    //Titulo
    $mail->Body    = "Olá Senhor(a)!<br><br>Seu pagamento foi realizado, meus parabéns!!<br> Seja bem-vindo!";   //Corpo
    $mail->AltBody = "Olá Senhor(a)!<br><br>Seu pagamento foi realizado, meus parabéns!!<br> Seja bem-vindo!";
    $mail->send();

} catch (Exception $e) {
    header('Location: cadastrar.html');
}




?>