<?php
session_start();

//Faz a conexão com o BD.
require 'conexao.php';

//Verifica o acesso do aluno
if($_SESSION['acesso']=="Aluno"){

    //Dados do formulário
    $campoid = $_POST["id"];

    //Pegando dia da desmatricula
    $fim =  date('Y/m/d');

    //Ação no BD
    $sql = "UPDATE usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario SET ID_plano='', Inicio='', Expiracao='', Condicao='Inadimplente', Fim_matricula='$fim' WHERE ID_aluno='$campoid'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
    header('Location: index.html');
    exit;
  }else{
    echo "Erro ao Cancelar: " . $conn->error;
    header('Location: login.php'); //Redireciona para o principal	
    exit;
  }
  //Fecha a conexão 
   $conn->close();   
}else{
    header('Location: index.html');
    exit;
    //Fecha a conexão.
    $conn->close();  
}