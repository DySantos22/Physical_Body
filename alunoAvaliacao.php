<?php
session_start();

//Faz a conexão com o BD.
require 'conexao.php';

//Verifica se o usuário logou.
if(!isset ($_SESSION['email']))
{
  unset($_SESSION['email']);
  header('location:index.html');
  exit;
}

$id = $_GET["id"];

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM aluno WHERE ID_aluno = '$id'";
//Executa o SQL
$result = $conn->query($sql);

//Se a consulta tiver resultados
    if ($result->num_rows > 0) {

// Cria uma matriz com o resultado da consulta
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Avaliação</title>
    <link rel="icon" href="images/TCC-logo.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/html_cadastro.css">
    <link rel="stylesheet" type="text/css" href="css/form_cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="ps-3 pt-2 seta">
        <a href="avaliacoes.php">
            <img src="images/seta-esquerda.svg">
        </a>
    </div>    

    <div class="form-group d-flex justify-content-center">

        <form action="avaliacaoCadastrar.php" method="post" name="formulario">
            <h1 id="titulo">Avaliação</h1>

            <fieldset>
                <div class="container text-center">
                    <div class="campo">
                    <label for="Peso" aling="center">
                        <input type="hidden" name="id" value="<?php echo $row["ID_aluno"]; ?>">
                            <input type="text" name="Peso" id="Peso" maxlength="8"
                                placeholder="Peso" autocomplete="off" required>
                        </label>
                        <label for="Altura" aling="center">
                        <input type="hidden" name="id" value="<?php echo $row["ID_aluno"]; ?>">
                            <input type="text" name="Altura" id="Altura" maxlength="8"
                                placeholder="Altura" autocomplete="off" required>
                        </label>
                        <label for="Peito" aling="center">
                            <input type="text" name="Peito" id="Peito" maxlength="8"
                                placeholder="Peito" autocomplete="off" required>
                        </label>
                        <label for="Ombros" aling="center">
                            <input type="text" name="Ombros" id="Ombros" maxlength="8"
                                placeholder="Ombros" autocomplete="off" required>
                        </label>
                        <label for="Abdomen" aling="center">
                            <input type="text" name="Abdomen" id="Abdomen" maxlength="8"
                                placeholder="Abdomen" autocomplete="off" required>
                        </label>
                        <label for="Biceps_direito" aling="center">
                            <input type="text" name="Biceps_dir" id="Biceps_dir" maxlength="8"
                                placeholder="Biceps direito" autocomplete="off" required>
                        </label>
                        <label for="Biceps_esquerdo" aling="center">
                            <input type="text" name="Biceps_esq" id="Biceps_esq" maxlength="8"
                                placeholder="Biceps esquerdo" autocomplete="off" required>
                        </label>
                        <label for="Cintura" aling="center">
                            <input type="text" name="Cintura" id="Cintura" maxlength="8"
                                placeholder="Cintura" autocomplete="off" required>
                        </label>
                        <label for="Coxa_direita" aling="center">
                            <input type="text" name="Coxa_dir" id="Coxa_dir" maxlength="8"
                                placeholder="Coxa direita" autocomplete="off" required>
                        </label>
                        <label for="Coxa_esquerda" aling="center">
                            <input type="text" name="Coxa_esq" id="Coxa_esq" maxlength="8"
                                placeholder="Coxa esquerda" autocomplete="off" required>
                        </label>
                        <label for="Panturrilha_direita" aling="center">
                            <input type="text" name="Panturrilha_dir" id="Panturrilha_dir" maxlength="8"
                                placeholder="Panturrilha direita" autocomplete="off" required>
                        </label>
                        <label for="Panturrilha_esquerda" aling="center">
                            <input type="text" name="Panturrilha_esq" id="Panturrilha_esq" maxlength="8"
                                placeholder="Panturrilha esquerda" autocomplete="off" required>
                        </label>
                    </div>
                </div class="campo">
                <input type="submit" name="Continuar" id="button-button" value="Finalizar"">
    </div>
    </fieldset>
    </form>
</body>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
    ?>
</html>