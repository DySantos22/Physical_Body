<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Professor"){

//Faz a conexão com o BD.
require 'config_pdo.php';

//Dados do formulário
$data = [
  'ID_aluno' => $_POST['ID_aluno'],
  'Exercicio' => $_POST['Exercicio'],
  'Repeticao' => $_POST['Repeticao'],
  'Tipo' => $_POST['Tipo'],
  'Observacao' => $_POST['Observacao'],
];
 
$stmt = $conn->prepare('INSERT INTO serie(ID_aluno, Exercicio, Repeticao, Tipo, Observacao) VALUES (:ID_aluno, :Exercicio, :Repeticao, :Tipo, :Observacao)');

try{
  $conn->beginTransaction();
  $stmt->execute($data);
  $conn->commit();
}catch (Exception $e) {
  $conn->rollback();
  throw $e;
}

//Se o usuario não tiver acesso
}else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 
