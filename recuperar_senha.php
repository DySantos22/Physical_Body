<?php
session_start();

require_once __DIR__.'/lib/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';
require  'conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email_recuperar'])){

    $email = $_POST['email_recuperar'];

    $sql = "SELECT * FROM usuario WHERE Email = '$email'";

    $result = $conn->query($sql);

    if($result->num_rows> 0){
    
    //Instanciando a váriavel do email 
if(isset($_POST['Enviar'])){    
    $mail = new PHPMailer(true);     //Instancia do PHPmailer
    
    //Fazendo a ligação do email
    try {
        //Configurações do servidor (gmail)
        $mail->isSMTP();      
        $mail-> SMTPSecure = 'TLS';                                  //Enviar usando TLS
        $mail->Host       = 'smtp.gmail.com';                     //Servidor usado
        $mail->SMTPAuth   = true;                                   //Ativando autenticacao SMTP
        $mail->Username   = 'SEU EMAIL';                     //Usuario SMTP
        $mail->Password   = 'SUA SENHA DO EMAIL';                        //Senha SMTP     
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
        $mail->isHTML(true);                                  //Habilitando o uso do HTML
        $mail-> charset = 'UTF-8';
        $mail->Subject = 'Recuperar Email';    //Titulo
        $mail->Body    = "Olá!!<br><br>Clique no link abaixo para mudar a sua senha:<br><br>
        <a href='http://localhost/recuperando.php?email=$email' target='_blank'>Clique Aqui!</a>";   //Corpo
        $mail->AltBody = "Olá, seja bem vindo!!\n\nClique no link abaixo para mudar a sua senha:\n\n
        <a href='http://localhost/recuperando.php?email=$email' target='_blank'>Clique Aqui!</a>";
        $mail->send();
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Email enviado</div>'];
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Email enviado</div>';
        header('Location: login.php');
        echo json_encode($retorna);
        exit;  

    } catch (Exception $e) {
        
        echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";  
        header('refresh:2;url=login.php');
        exit;
    }
    }
}else{
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Esse email não existe!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Esse email não existe!</div>';
    header('Location: login.php');
    echo json_encode($retorna);
    exit; 
}

    //Mandando os dados para o banco 
    mysqli_query($conn,$sql);
    mysqli_close($conn);
}
?>
