<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE aluno INNER JOIN usuario ON aluno.ID_usuario = usuario.ID_usuario SET Nome='$nome', Email='$email', Data_de_nascimento='$nascimento', Telefone='$telefone' WHERE usuario.ID_usuario = '$id'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: alunoscontrolar.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 