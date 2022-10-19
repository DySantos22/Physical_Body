<?php
session_start();

//Verifica se o usuário logou.
if(!isset ($_SESSION['email']))
{
  unset($_SESSION['email']);
  header('location:index.html');
  exit;
}

//Cria as variáveis
$email = $_SESSION['email'];

  //Ligação com o BD
  require 'conexao.php';

  //Puxa as informações
  $sql = "SELECT * FROM agendamento INNER JOIN aluno ON agendamento.ID_aluno = aluno.ID_aluno INNER JOIN usuario ON aluno.ID_usuario = usuario.ID_usuario WHERE status='Aguardando' ORDER BY Data_agendamento";
  $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Avaliações</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/alunosAgendados.css">
    <link rel="stylesheet" href="css/navbarlateral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

    <!-- Navbar lateral -->
    <nav class="navigation">
        <ul>
            <!-- Botão de avaliacoes -->
            <li class="list active">
                <a href="avaliacoes.php">
                    <span class="icon">
                        <ion-icon name="calendar-outline"></ion-icon>
                    </span>
                    <span class="title">Avaliações</span>
                </a>
            </li>
            <!-- Botão que o usuario desloga -->
            <li class="list">
                <a href="deslogar.php">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sair</span>
                </a>
            </li>
        </ul>
    </nav>

    <main>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Alunos agendados</h2>
				</div>
			</div>
            <?php 
                if($result->num_rows>0){
            ?>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped table-dark table-hover">
						  <thead>
						    <tr>
						      <th>Nome</th>
						      <th>Data</th>
						      <th>Horário</th>
                              <th>Ações</th>
						    </tr>
						  </thead>
						  <tbody>
                          <?php
			                    while($row = $result->fetch_assoc()){
                                    $data = $row['Data_agendamento'];
				                    $time = date("H:s", strtotime($data));
				                    $data = date("d/m/Y", strtotime($data));
				            ?>
						    <tr>
						        <td class="text-center"><?= $row['Nome']; ?></td>
						        <td class="text-center"><?= $data; ?></td>
						        <td class="text-center"><?= $time; ?></td>
                                <td class="text-center d-flex justify-content-around">
                                        <a  href="alunoAvaliacao.php?id=<?= $row['ID_aluno']?>">
                                            <img src="images/regua.png">
                                        </a>
                                        <a href="alunoSerie.php?id=<?= $row['ID_aluno']?>">
                                            <img src="images/barbell.png">
                                        </a>
                                        <a href="finalizarAvaliacao.php?agendamento=<?= $row['ID_agendamento']?>">
                                            <img src="images/circle-check-solid.svg">
                                        </a>
                                </td>
						    </tr>
                            <?php
                                }}?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="scripts/navbarlateral.js"></script>
</body>

</html>