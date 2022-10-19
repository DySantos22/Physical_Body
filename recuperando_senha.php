<?php
session_start();
require 'conexao.php';

if(isset($_POST['senha'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $hash = password_hash($senha, PASSWORD_BCRYPT);

    $sql = "UPDATE usuario SET Senha = '$hash' WHERE Email = '$email'";

    $result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Registro atualizado!</div>'];
  $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Registro atualizado!</div>';
  header('Location: login.php');
  echo json_encode($retorna);
  exit;  
} else {
  echo "Erro: " . $conn->error;
}
}
?>