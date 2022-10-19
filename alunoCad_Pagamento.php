<?php
session_start();

//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//variáveis
$id_plano = $_SESSION['id_plano'];
$email = $_SESSION['email_aluno'];
$preco = $_SESSION['preco'];

//Data de hoje
$data = new \DateTime('America/Sao_Paulo');
$data = $data->format("Y/m/d H:i");

//Pegando ID do aluno
$sql = "SELECT * FROM aluno INNER JOIN usuario ON aluno.ID_usuario = usuario.ID_usuario WHERE Email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['ID_aluno'];

//Registra o pagamento
$sql2 = "INSERT INTO pagamento(ID_aluno, Valor, Data_pagamento) VALUES('$id', '$preco', '$data')";
$result2 = $conn->query($sql2);

//Redireciona para o CRUD
header('refresh:0; url=alunoscontrolar.php');
exit;

//Se não for ADM:
}else{
header('Location: index.html');
}
?>