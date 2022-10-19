<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

require 'conexao.php';

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Treinos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/navbarlateral.css">
    <link rel="stylesheet" href="css/htmlSecundario.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

  <!-- Navbar lateral -->
  <nav class="navigation">
    <ul>
      <!-- Home -->
      <li class="list">
        <a href="principal.php">
          <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
          </span>
          <span class="title">Perfil</span>
        </a>
      </li>
      <!-- Botão que leva aos treinos -->
      <li class="list active">
        <a href="treinos.php">
          <span class="icon">
            <ion-icon name="people-outline"></ion-icon>
          </span>
          <span class="title">Treinos</span>
        </a>
      </li>
      <!-- Botão de agendamento -->
      <li class="list">
        <a href="agendamento.php">
          <span class="icon">
            <ion-icon name="calendar-outline"></ion-icon>
          </span>
          <span class="title">Agendamento</span>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="scripts/navbarlateral.js"></script>

    <main>

    <h2 class="pt-5 text-center">Série</h2>
    <p class="text-center">Faça uma nova daqui 3 meses</p>


    <?php
            //Cria o SQL (consulte tudo da tabela serie)
            $sql2 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'A'";
            //Executa o SQL
            $result2 = $conn->query($sql2);

            //Se a consulta tiver resultados
            if($result2->num_rows > 0) {

        ?>
    <a href="javascript:demoFromHTML()" class="button">Download da série</a>
  <div id="content">
    <!-- Tipo A -->
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
      <h2 class="heading-section pt-5">Série A</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped table-dark table-hover">
						  <thead>
						    <tr>
						      <th class="text-center">Exercicio</th>
						      <th class="text-center">Repetições</th>
						      <th class="text-center">Observações</th>
                                <?php
                                    while($row2 = $result2->fetch_assoc()){
                                ?>  
						    </tr>
                            
						  </thead>
                          
						  <tbody>
						    <tr>
						      <td class="text-center"><?= $row2['Exercicio']; ?></td>
						      <td class="text-center"><?= $row2['Repeticao']; ?></td>
						      <td class="text-center"><?= $row2['Observacao']; ?></td>
						    </tr>
                            <?php 
                                }?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
            <?php
	            //Se a consulta não tiver resultados	
                }
            ?>
		</div>
	</section>

    
    <?php 
        $sql3 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'B'";
            //Executa o SQL
            $result3 = $conn->query($sql3);

            //Se a consulta tiver resultados
            if($result3->num_rows > 0) {
                ?>

                <!-- Tipo B -->
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
      <h2 class="heading-section">Série B</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped table-dark table-hover">
						  <thead>
						    <tr>
						      <th class="text-center">Exercicio</th>
						      <th class="text-center">Repetições</th>
						      <th class="text-center">Observações</th>
                                <?php
                                    while($row3 = $result3->fetch_assoc()){
                                ?>  
						    </tr>
                            
						  </thead>
                          
						  <tbody>
						    <tr>
						      <td class="text-center"><?= $row3['Exercicio']; ?></td>
						      <td class="text-center"><?= $row3['Repeticao']; ?></td>
						      <td class="text-center"><?= $row3['Observacao']; ?></td>
						    </tr>
                            <?php 
                                }?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
            <?php
	            //Se a consulta não tiver resultados	
                }
            ?>
		</div>
	</section>

    <?php 
        $sql4 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'C'";
            //Executa o SQL
            $result4 = $conn->query($sql4);

            //Se a consulta tiver resultados
            if($result4->num_rows > 0) {
                ?>
               <!-- Tipo C -->
               <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
      <h2 class="heading-section">Série C</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped table-dark table-hover">
						  <thead>
						    <tr>
						      <th class="text-center">Exercicio</th>
						      <th class="text-center">Repetições</th>
						      <th class="text-center">Observações</th>
                                <?php
                                    while($row4 = $result4->fetch_assoc()){
                                ?>  
						    </tr>
                            
						  </thead>
                          
						  <tbody>
						    <tr>
						      <td class="text-center"><?= $row4['Exercicio']; ?></td>
						      <td class="text-center"><?= $row4['Repeticao']; ?></td>
						      <td class="text-center"><?= $row4['Observacao']; ?></td>
						    </tr>
                            <?php 
                                }?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
            <?php
	            //Se a consulta não tiver resultados	
                }
            ?>
		</div>
	</section>
    <?php 
        $sql5 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'D'";
            //Executa o SQL
            $result5 = $conn->query($sql5);

            //Se a consulta tiver resultados
            if($result5->num_rows > 0) {
                ?>
               <!-- Tipo D -->
               <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
      <h2 class="heading-section">Série D</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped table-dark table-hover">
						  <thead>
						    <tr>
						      <th class="text-center">Exercicio</th>
						      <th class="text-center">Repetições</th>
						      <th class="text-center">Observações</th>
                                <?php
                                    while($row5 = $result5->fetch_assoc()){
                                ?>  
						    </tr>
                            
						  </thead>
                          
						  <tbody>
						    <tr>
						      <td class="text-center"><?= $row5['Exercicio']; ?></td>
						      <td class="text-center"><?= $row5['Repeticao']; ?></td>
						      <td class="text-center"><?= $row5['Observacao']; ?></td>
						    </tr>
                            <?php 
                                }?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
            <?php
	            //Se a consulta não tiver resultados	
                }
            ?>
		</div>
	</section>
  </div>
    </main>

    <script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#content')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('Serie.pdf');
            }, margins
        );
    }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</body>

</html>