<?php 
session_start();

//Conexao
require 'conexao.php';
if($_SESSION['acesso'] == "Aluno"){

//Obtendo Chave do aluno
$chave = $_SESSION['chave'];
$_SESSION['chave'] = $chave;

//BD
$sql = "UPDATE usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario SET Condicao = 'Inadimplente', Inicio='', Expiracao='', ID_plano='' WHERE Chave = '$chave'";

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Obtenha um de nossos planos')</script>";
    header("refresh:1;url=escolherplano.php?chave=$chave");
  } else {
    echo "Erro: " . $conn->error;
  }
  //Fecha a conexão.
      $conn->close();
}
?>
