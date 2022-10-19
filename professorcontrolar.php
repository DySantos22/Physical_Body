<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin") {

    //Faz a conexão com o BD.
    require 'conexao.php';

    //Cria o SQL (consulte tudo da tabela usuarios)
    $sql="SELECT * FROM usuario WHERE Acesso = 'Professor'";

    //Executa o SQL
    $result=$conn->query($sql);

    //Se a consulta tiver resultados
    if ($result->num_rows > 0) {
        ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Controlar Professores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/html_principal.css">
  <link rel="stylesheet" href="css/main_controlar.css">
  <link rel="stylesheet" href="css/tabela.css">
  <link rel="stylesheet" href="css/navbarlateral.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" defer>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script>
  <script src="scripts/navbarlateral.js" defer></script>
  <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>
  <nav class="navigation">
    <ul>

      <li class="list">
        <a href="alunoscontrolar.php">
          <span class="icon">
            <ion-icon name="file-tray-full-outline"></ion-icon>
          </span>
          <span class="title">Controlar Alunos</span>
        </a>
      </li>

      <li class="list active ">
        <a href="professorcontrolar.php">
          <span class="icon">
            <ion-icon name="file-tray-full-outline"></ion-icon>
          </span>
          <span class="title">Controlar Professores</span>
        </a>
      </li>

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
  <div class="content">
  <h1 id="apresentacao">NOSSOS <span class="alun">PROFESSORES</span></h2>
    <table id="tabela" class="table table-stripe">
    <thead>
        <tr>
            <th class="text-center">Nome</th>
            <th class="text-center">Email</th>
            <th class="text-center">Condição</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
            while($row = $result->fetch_assoc()){
         ?>  
            <td class="text-center"><?= $row['Nome']?></td>
            <td class="text-center"><?= $row['Email']?></td>
            <td class="text-center"><?= $row['Condicao']?></td>
        </tr>
        <?php 
          }?>
    </tbody>
</table>

<script>
  $(document).ready( function () {
    $('#tabela').DataTable({
      "language": {
                "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json",
  }});
});
</script>
      <?php
$sql1 = "SELECT count(*) as Ativo FROM usuario   WHERE Condicao='Ativo' AND Acesso='Professor'";
$sql2 = "SELECT count(*) as Inativo  FROM usuario WHERE Condicao='Inativo' AND Acesso='Professor'";


//Executa o SQL
$result = $conn->query($sql1);
$result2 = $conn->query($sql2);

//Prepara as contagens
$row1 = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();
?>
  <div class="grafico">
    <h1 id="apresentacao">ACESSO AOS <span class="alun">GRÁFICOS</span></h1>
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <script type="text/javascript">
        var ctx = document.getElementById("myChart");
        var valores = [<?php echo $row1["Ativo"] ?>, <?php echo $row2["Inativo"] ?>];
        var tipos = ["Ativo", "Inativo"];
        
        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "professor",
                data: valores,
                backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(153, 102, 255, 0.2)",
                ]
              }
            ]
          }
        }); 
    </script>         
  </div>
</body>

</html>
<?php //Se a consulta não tiver resultados  			
    }else {
        echo "<h1>Nenhum resultado foi encontrado.</h1>";
        header("refresh:3;url=principalAdmin.php");
    }

    //Fecha a conexão.	
    $conn->close();

    //Se o usuário não usou o formulário
}

else {
    header('Location: index.html'); //Redireciona para o form
    exit; // Interrompe o Script
}

?>