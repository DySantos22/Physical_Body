<?php
session_start(); 

//Faz a conexão com o BD.
require 'conexao.php';
 
//Faz a leitura do dado passado pelo link.
$id = $_GET["id"];

// Apagar da tabela usuários o registro com o id
$sql = "DELETE FROM serie WHERE ID_aluno=$id";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE){

   header("Location: alunoSerie.php?id=$id");
   exit;
}else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 