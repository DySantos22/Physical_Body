<?php
if($_SESSION['acesso']!="Aluno"){
  header('location:login.php'); //Redireciona para o form
exit; // Interrompe o Script
}
?>