<?php
session_start();
//Conectando com o banco de dados
require "conexao.php";

if ((isset($_POST['email']))&&(!empty($_POST['email']))){

//Pegando os dados inseridos
$acesso = 'Aluno';
$condicao = 'Inativo';
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome']; 
$_SESSION['email'] = $email;
$_SESSION['sexo'] = $_POST['sexo'];
$_SESSION['cpf'] = $cpf;
$_SESSION['celular'] = $_POST['celular'];
$_SESSION['nascimento'] = $_POST['nascimento'];

//Criptografando 
$text = $_POST['confirma_senha'];
$hash = password_hash($text, PASSWORD_BCRYPT);

//Chave para confirmar email
$chave = password_hash($email . date('Y-m-d H:i:s'),PASSWORD_DEFAULT);
$_SESSION['chave'] = $chave;

//Verifica email duplicado e retorna erro.
$sql = "SELECT Email FROM usuario WHERE Email='$email'";
$sql2 = "SELECT CPF FROM aluno WHERE CPF='$cpf'";

//Gerando os resultados
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Linhas 
$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();

//Verificando se já existe o Email no BD
if ($result->num_rows > 0) {
  $retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">Email já existe!</div>'];
  $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email já existe!</div>';
  header('refresh:0;url=cadastrar.php');
  echo json_encode($retorna);
  exit;  
}

//Verifica se já existe o CPF no BD
if($result2->num_rows >0){
  $retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">CPF já cadastrado!</div>'];
  $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">CPF já cadastrado!</div>';
  header('refresh:0;url=cadastrar.php');
  echo json_encode($retorna);
  exit;  
}

//inserindo os dados
$sql = "INSERT INTO usuario(Nome, Email, Senha, Acesso, Condicao, Chave) VALUES('$nome', '$email','$hash', '$acesso', '$condicao', '$chave')";

if ($conn->query($sql) === TRUE) {
  header('refresh:0;url=cadastrarFinal.php');
}
}
?>