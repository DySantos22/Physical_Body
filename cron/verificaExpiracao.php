<?php
//Conectando com o banco de dados
require "conexao.php";

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$data = date('d/m/Y');

$sql = "SELECT * FROM usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$data_dif = $data->diff($row['Expiracao']);

echo $data_dif;

