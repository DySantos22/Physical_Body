<?php
session_start();

//Faz a conexão com o BD.
include 'conexao.php';

//Dados do formulário
$chave = $_GET['chave'];
$_SESSION['chave'] = $chave;

//Sql que altera um registro da tabela usuario

$sql2 = "UPDATE usuario SET Condicao='Inadimplente' WHERE Condicao='Inativo' AND Chave='$chave'";


//Executa o sql e faz tratamento de erro.
if ($conn->query($sql2) === TRUE) {
  echo "<script>alert('E-mail cadastrado com sucesso!!')</script>";
  header('refresh:1;url=escolherplano.php');
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	
?> 