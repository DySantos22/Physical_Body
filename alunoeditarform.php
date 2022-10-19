<?php
session_start();
//Verifica o acesso.
if($_SESSION['acesso']=="Admin"){

//Faz a leitura do dado passado pelo link.
$campoid = $_GET["id"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM aluno WHERE ID_aluno = $campoid";

//Executa o SQL
$result = $conn->query($sql);

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/form_editarecadastrar.css">
        <link rel="icon" href="images/TCC-logo.png"/>
        <title>Editar usuário</title>
    </head>
    <body>
        <form action="alunoeditar.php" method="post">
            <h3>Aluno: <?php echo $row["Nome"]; ?></h3>
            <input type="hidden" name="id" value="<?php echo $row["ID_aluno"]; ?>">
            <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome..." required>		
            <input type="email" name="email" value="<?php echo $row["Email_aluno"]; ?>" placeholder="Seu e-mail..." required>	        
            <input type="submit" value="Editar">
        </form>
    </body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não tem acesso.
} else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?> 