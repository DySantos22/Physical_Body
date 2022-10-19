<?php
session_start();
//Conectando com o banco de dados
require "conexao.php";

require_once __DIR__. '/lib/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$termo = 'v1';
$email = $_SESSION['email'];
$sexo = $_SESSION['sexo'];
$cpf = $_SESSION['cpf'];
$celular = $_SESSION['celular'];
$nascimento = $_SESSION['nascimento'];
$matricula = rand(100000, 999999);

$data_matricula = date('d/m/Y');

//Chave para confirmar email
$chave = $_SESSION['chave'];

$sql = "SELECT * FROM usuario WHERE Email='$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_id = $row['ID_usuario'];

$sql2 = "INSERT INTO aluno(ID_usuario, Matricula, CPF, Data_de_nascimento, Telefone, Sexo, Data_matricula, Versao_termo) VALUES ('$user_id','$matricula','$cpf','$nascimento','$celular', '$sexo', '$data_matricula', '$termo')";

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
    $mail->isHTML(true);                                  //Habilitando o uso do HTML
    $mail->charset = 'UTF-8';
    $mail->Subject = 'Confirmar Email';    //Titulo
    $mail->Body    = "Olá, seja bem vindo!!<br><br>Clique no link abaixo para confirmar seu e-mail:<br><br>
    <a href='http://localhost/confirma_email.php?chave=$chave' target='_blank'>Clique Aqui!</a>";   //Corpo
    $mail->AltBody = "Olá, seja bem vindo!!\n\nClique no link abaixo para confirmar seu e-mail:\n\n
    <a href='http://localhost/confirma_email.php?chave=$chave' target='_blank'>Clique Aqui!</a>";
  
  //Impedindo que o email seja enviado, se as senhas não forem iguais
 if($conn->query($sql2) === TRUE){
    $mail->send();
    header('refresh:3;url=index.html');
  }else{
    header('refresh:0;url=cadastrar.php');
  }

} catch (Exception $e) {
    echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o cadastro novamente
    header('refresh:2;url=index.html');
}

//Mandando os dados para o banco 
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<script src="scripts/sweetalert2.js"></script>
<script src="scripts/custom.js"></script>
</body>
</html>