<?php
session_start();

//Verifica o acesso.
require 'acessoadm.php';
 
//Conecta com o banco 
require 'conexao.php';

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];
$campocondicao = $_GET["condicao"];
 

if($campocondicao == "Ativo"){

// Bloquear usuário o registro com o id
$sql = "UPDATE usuario SET Condicao='Inativo' WHERE ID_usuario='$campoid'";

}else{
    
$sql = "UPDATE usuario SET Condicao='Ativo' WHERE ID_usuario='$campoid'";
}

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Usuário bloqueado";
  
  include 'log.php';
  
   header('Location: alunoscontrolar.php?pag=1'); //Redireciona para o controle  
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();

?> 