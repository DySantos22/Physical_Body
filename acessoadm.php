<?php
//Verifica se o usuário logou.
	if($_SESSION['acesso']!="Admin"){
		    header('location:login.php'); //Redireciona para o form
			exit; // Interrompe o Script
	}

?>
