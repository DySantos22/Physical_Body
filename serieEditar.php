<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Professor"){

//Dados do formulário
$id = $_GET['id'];
$id_serie = $_POST['id_editar'];
$exercicio = $_POST['exercicio_editar'];
$repeticao = $_POST['repeticoes_editar'];
$tipo = $_POST['tipo_editar'];
$obs = $_POST['obs_editar'];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE serie SET Exercicio='$exercicio', Repeticao='$repeticao', Tipo='$tipo', Observacao='$obs' WHERE ID_serie = '$id_serie'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
    header("Location: alunoSerie.php?id=$id"); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 