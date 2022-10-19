<?php
session_start();

//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Pegando os dados inseridos
$acesso = 'Aluno';
$condicao = 'Ativo';
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$_SESSION['sexo'] = $_POST['sexo'];
$_SESSION['email_aluno'] = $email;
$_SESSION['plano'] = $_POST['plano'];
$_SESSION['cpf'] = $cpf;
$_SESSION['celular'] = $_POST['celular'];
$_SESSION['nascimento'] = $_POST['nascimento'];

//Pegando Dia atual
$data = new \DateTime('America/Sao_Paulo');
$expiracao = new \DateTime('America/Sao_Paulo');

//Criptografando 
$text = $_POST["senha"];
$hash = password_hash($text, PASSWORD_BCRYPT);
$chave = password_hash($email . date('Y-m-d H:i:s'),PASSWORD_DEFAULT);

      $sql2 = "INSERT INTO usuario(Nome, Email, Senha, Acesso, Condicao, Chave) VALUES('$nome', '$email','$hash', '$acesso', '$condicao', '$chave')";
      $result = $conn->query($sql2);

      header('refresh:0; url=alunoCadastrar2.php');
      exit;
}else{
  header('Location: index.html');
  }

?>