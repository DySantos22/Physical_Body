<?php
session_start();

//Conexao com o BD
require 'conexao.php';

if($_SESSION['acesso']=="Aluno"){   

if(isset($_POST['submit'])){
//Variaveis
$id = $_SESSION['id_usuario'];
$email = $_SESSION['email'];
$perfil = $_FILES['perfil']['name'];
$perfil_tipo = $_FILES['perfil']['type'];


//Conexao
$sql = "SELECT * FROM usuario WHERE ID_usuario ='$id'";
$sql2 = "UPDATE usuario SET Imagem='$perfil' WHERE ID_usuario ='$id'";

//Os resultados 
$result = mysqli_query($conn, $sql);
//Matriz
$row = $result->fetch_assoc();

//Ligando ao BD
mysqli_query($conn,$sql);
mysqli_query($conn,$sql2);

//A pasta onde fica as imagens do usuario com o nome do email dele
$pasta = $email;

//Cria a pasta do usuario em PHP
mkdir("users/".$pasta,0777);

//Move as fotos para a pasta
move_uploaded_file($_FILES['perfil']['tmp_name'],"users/".$pasta."/".$perfil);

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql2) === TRUE) {
    header('Location:principal.php');
  } else {
    echo "Erro: " . $conn->error;
    header('refresh:1;url=login.html');
  }
  
  //Fecha a conexÃ£o.
      $conn->close();
}
}else {
    header('Location:index.html'); //Redireciona para o index
    exit; // Interrompe o Script
}

?>