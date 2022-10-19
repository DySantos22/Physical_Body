<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Professor"){

//Dados do formulário
$id = $_POST["id"];
$peso = $_POST["Peso"];
$altura = $_POST["Altura"];
$peito = $_POST["Peito"];
$ombros = $_POST["Ombros"];
$abdomen = $_POST["Abdomen"];
$biceps_dir = $_POST["Biceps_dir"];
$biceps_esq = $_POST["Biceps_esq"];
$cintura = $_POST["Cintura"];
$coxa_dir = $_POST["Coxa_dir"];
$coxa_esq = $_POST["Coxa_esq"];
$panturrilha_dir = $_POST["Panturrilha_dir"];
$panturrilha_esq = $_POST["Panturrilha_esq"];

//Faz a conexão com o BD.
require 'conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE aluno SET Peso='$peso', Altura='$altura', Peito='$peito', Ombros='$ombros', Abdomen='$abdomen',Biceps_direito='$biceps_dir', Biceps_esquerdo='$biceps_esq', Cintura='$cintura', Coxa_direita='$coxa_dir', Coxa_esquerda='$coxa_esq', Panturrilha_direita='$panturrilha_dir', Panturrilha_esquerda='$panturrilha_esq' WHERE ID_aluno='$id'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  echo "Avaliação registrada com sucesso";
} else {
  echo "Erro: " . $conn->error;
}
    header('Location: avaliacoes.php'); //Redireciona para o form	

//Fecha a conexão.
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 