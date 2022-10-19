<?php
session_start();
//Verifica o acesso do aluno
if($_SESSION['acesso']=="Aluno"){

//Dados do formulário
$campoid = $_POST["id"];
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$camposenha = $_POST['senha'];
$campotelefone = $_POST['telefone'];

//Criptografando senha
$hash = password_hash($camposenha, PASSWORD_BCRYPT);

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela aluno
$sql = "UPDATE usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario SET Nome='" . $camponome . "', Email='" . $campoemail .  "', Senha='" . $hash . "', Telefone='" . $campotelefone . "' WHERE ID_aluno=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: principal.php'); //Redireciona para o principal	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o index
    exit; // Interrompe o Script
}

?> 