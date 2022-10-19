<?php
session_start();

if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuario WHERE Email='$campoemail' AND Acesso='Admin'";
$sql2= "SELECT * FROM aluno INNER JOIN usuario ON aluno.ID_usuario = usuario.ID_usuario WHERE Email='$campoemail' AND Acesso='Aluno'";
$sql3 = "SELECT * FROM usuario WHERE Email='$campoemail' AND Acesso='Professor'";

//Executa o SQL
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);


// Cria uma matriz com o resultado da consulta
 $row = $result->fetch_assoc();
 $row2 = $result2->fetch_assoc();
 $row3 = $result3->fetch_assoc();
 

 //Pega a data atual
 $data = date('Y/m/d H:i');
 //Pega a data da expiracao
 $data_expiracao = $row2['Expiracao'];

 
	//Se a consulta tiver resultados
	if ($result->num_rows > 0 || $result2->num_rows>0 || $result3->num_rows>0){
		
		//Ele impede o acesso de alunos que foram bloqueados
		if($row2['Email'] == $campoemail AND $row2['Condicao'] != 'Ativo' ){
			$retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">Confirme seu e-mail ou Entre em contato conosco!</div>'];
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Confirme seu e-mail ou Entre em contato conosco!</div>';
			header('refresh:0;url=cadastrar.php');
			echo json_encode($retorna);
			exit;  
			//Ele impede o acesso de funcionarios que foram bloqueados
		}else if($row3['Email'] == $campoemail AND $row3['Condicao'] != "Ativo"){
			$retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">Entre em contato conosco!</div>'];
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Entre em contato conosco!</div>';
			header('refresh:0;url=cadastrar.php');
			echo json_encode($retorna);
			exit;  
		}
		
		//Aqui ele verifica o acesso e verifica se o plano expirou ou está vazio!
	 if($row2['Acesso'] == "Aluno" AND $data > $data_expiracao || $data_expiracao == ''){
			$_SESSION['acesso'] = $row2['Acesso'];
			$_SESSION['chave'] = $row2['Chave'];
			header('refresh:0;url=verificaplano.php');
			exit;
		}else{
		
		//Ele verifica a senha e deixa o ADM acessar
		if(password_verify($camposenha, $row["Senha"])){
			$_SESSION['nome'] = $row["Nome"]; 
			$_SESSION['email'] = $row['Email'];
			$_SESSION['acesso'] = $row["Acesso"];
			$_SESSION['id'] = $row["ID_usuario"];
			header('Location:alunoscontrolar.php');
		}//Ele verifica a senha, acesso e deixa o aluno acessar
			if(password_verify($camposenha, $row2["Senha"])){ 
				$_SESSION['nome'] = $row2["Nome"];
				$_SESSION['email'] = $row2["Email"];
				$_SESSION['acesso'] = $row2["Acesso"];
				$_SESSION['id'] = $row2['ID_aluno'];
				$_SESSION['id_usuario'] = $row2['ID_usuario'];
				header('Location:principal.php');
			}//Ele verifica a senha, acesso e deixa o funcionario acessar
			if(password_verify($camposenha, $row3["Senha"])){
				$_SESSION['nome'] = $row3['Nome'];
				$_SESSION['email'] = $row3['Email'];
				$_SESSION['acesso'] = $row3['Acesso'];
				$_SESSION['id'] = $row3["ID_usuario"];
				header('Location:avaliacoes.php');
			}else{	
				$retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">Email ou senha incorreta!</div>'];
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email ou senha incorreta!</div>';
			header('refresh:0; url=login.php'); 
			echo json_encode($retorna);
			exit;  
			}
		}
	}else{
		$retorna = ['sit' => true, 'msg' => '<div class="alert alert-danger" role="alert">Email não existe!</div>'];
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email não existe!</div>';
	header('refresh:0; url=login.php'); 
	echo json_encode($retorna);
	exit;
	}
//Se o usuário não usou o formulário
} else {
    header('Location: login.php'); //Redireciona para o form
    exit; // Interrompe o Script
}

//Fecha a conexão.
$conn->close();
?>