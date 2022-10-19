<?php
session_start();
//Faz a conexão com o BD.
require 'conexao.php';

$id_agendamento = $_GET['agendamento'];
$id_professor = $_SESSION['id'];


$sql = "UPDATE agendamento SET ID_usuario='$id_professor', status='Realizado' WHERE ID_agendamento=$id_agendamento";
$result = $conn->query($sql);

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){
     header('Location: avaliacoes.php'); //Redireciona para o controle  
  }else{
    echo "Erro: " . $conn->error;
  }
?>