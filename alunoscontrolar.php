<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
if($_SESSION['acesso']=="Admin") {

    //Faz a conexão com o BD.
    require 'conexao.php';

    //Cria o SQL (consulte tudo da tabela usuarios)
    $sql = "SELECT * FROM usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario LEFT JOIN plano ON aluno.ID_plano = plano.ID_plano";

    //Executa o SQL
    $result=$conn->query($sql);

    //Se a consulta tiver resultados
    if ($result->num_rows > 0) {
      // Cria uma matriz com o resultado da consulta
        ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Controlar Alunos</title>
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
    <script src="scripts/navbarlateral.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" defer>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script>
    <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>
    <nav class="navigation">
        <ul>

            <li class="list active">
                <a href="alunoscontrolar.php">
                    <span class="icon">
                        <ion-icon name="file-tray-full-outline"></ion-icon>
                    </span>
                    <span class="title">Controlar Alunos</span>
                </a>
            </li>

            <li class="list ">
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
    <div class="content m-8">
        <h1 id="apresentacao">CONTROLE DE <span class="alun">ALUNOS</span></h1>
        <div class="d-grid gap-2 ms-5 me-5 mb-5">
        <a class="boto btn btn-secondary btn-lg" data-bs-toggle="modal" href="" data-bs-target="#modal_cadastro" role="button">CADASTRAR ALUNO</a>
        <a class="boto btn btn-secondary btn-lg" href="pdfTermo.php" role="button">DOWNLOAD DE TERMO</a>
    </div>
        <table id="tabela" class="table table-stripe">
            <thead>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Plano</th>
                    <th class="text-center">Telefone</th>
                    <th class="text-center">Condição</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
            while($row = $result->fetch_assoc()){
         ?>
                    <td class="text-center" id="nome"><?= $row['Nome']?></td>
                    <td class="text-center" id="email"><?= $row['Email']?></td>
                    <td class="text-center"><?= $row['Nome_plano']?></td>
                    <td class="text-center"><?= $row['Telefone']?></td>
                    <td class="text-center"><?= $row['Condicao']?></td>
                    <td class="text-center d-flex justify-content-evenly">
                        <a id="editar" href="" data-bs-toggle="modal" data-bs-target="#modal_editar" data-id="<?=$row['ID_usuario']?>" data-nome="<?=$row['Nome']?>" data-email="<?=$row['Email']?>" data-nascimento="<?=$row['Data_de_nascimento']?>" data-telefone="<?=$row['Telefone']?>" data-sexo="<?=$row['Sexo']?>">
                            <img src='images/editar.svg' alt='Editar Usuário'>
                        </a>
                        <a href='alunobloquear.php?id=<?=$row['ID_usuario']?>&condicao=<?=$row['Condicao']?>'>
                            <img src='images/block.svg' alt='Bloquear Usuário'></a>
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

        <!-- Modal de edição -->
        <div class="modal_editar">
            <form action="alunoeditar.php" method="post">
                <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="Editar"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="serie_editar">Editar Informações</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="text" name="id" id="input-id" class="form-control" aria-label="id" aria-describedby="basic-addon2" hidden>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="nome" id="input-nome" class="form-control" placeholder="Nome" aria-label="nome" aria-describedby="basic-addon2">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="input-email" class="form-control" value="" placeholder="Email" aria-label="email" aria-describedby="basic-addon2">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="nascimento" id="input-nascimento" class="form-control" value="" placeholder="Nascimento" aria-label="nascimento" aria-describedby="basic-addon2" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="telefone" id="input-telefone" class="form-control" value="" placeholder="Telefone" aria-label="telefone" aria-describedby="basic-addon2" onkeypress="$(this).mask('(00) 00000-0000')">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-dark" name="Enviar" value="Enviar">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            $(document).on("click", "#editar", function () {
            var id = $(this).data('id');
            $(".modal-body #input-id").val(id);
            var nome = $(this).data('nome');
            $(".modal-body #input-nome").val(nome);
            var email = $(this).data('email');
            $(".modal-body #input-email").val(email);
            var nascimento = $(this).data('nascimento');
            $(".modal-body #input-nascimento").val(nascimento);
            var telefone = $(this).data('telefone');
            $(".modal-body #input-telefone").val(telefone);
        });
        </script>

        <!-- Modal de cadastro -->
        <div class="modal_cadastro">
            <form action="alunoCadastrar.php" method="post">
                <div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="Cadastro"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cadastro_aluno">Cadastrar Aluno</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="input-group mb-3">
                            <input type="text" name="nome" class="form-control" placeholder="Nome"
                                      aria-label="Nome"
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                      aria-label="Email"
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group mb-3">
                                <input type="text" name="cpf" class="form-control" placeholder="CPF"
                                      aria-label="CPF"  onkeypress="$(this).mask('000.000.000-AA')"
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group mb-3">
                                <input type="text" name="nascimento" class="form-control" placeholder="Data de Nascimento"
                                      aria-label="Data de Nascimento"   onfocus="(this.type='date')"
                                onblur="if(!this.value) this.type='text'"
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group mb-3">
                                <input type="text" name="celular" class="form-control" placeholder="Telefone"
                                      aria-label="Telefone" onkeypress="$(this).mask('(00) 00000-0000')"   
                                        aria-describedby="basic-addon2" required>
                                </div>
                                <div class="gender-group" required>
                                    <div class="gender-input">
                                        <input type="radio" id="input-sexo" name="sexo" value="Masculino">
                                        <label for="female">MASCULINO</label>
                                    </div>

                                    <div class="gender-input">
                                        <input type="radio" id="input-sexo" name="sexo" value="Feminino">
                                        <label for="male">FEMININO</label>
                                    </div>

                                    <div class="gender-input">
                                        <input type="radio" id="input-sexo" name="sexo" value="Outros">
                                        <label for="other">OUTROS</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                <select name="plano" id="plano" class="form-select">
								<?php 
    								$sql = "SELECT * FROM plano WHERE ID_plano=1";
    								$result = $conn->query($sql);
    								$row = $result->fetch_assoc();
								?>
								<option value="<?=$row['Nome_plano']?>"><?= $row['Nome_plano']?></option>
								<?php 
    								$sql2 = "SELECT * FROM plano WHERE ID_plano=2";
    								$result2 = $conn->query($sql2);
    								$row2 = $result2->fetch_assoc();
		    					?>
								<option value="<?=$row2['Nome_plano']?>"><?= $row2['Nome_plano']?></option>
								<?php 
    								$sql3 = "SELECT * FROM plano WHERE ID_plano=3";
    								$result3 = $conn->query($sql3);
    								$row3 = $result3->fetch_assoc();
		    					?>
								<option value="<?=$row3['Nome_plano']?>"><?= $row3['Nome_plano']?></option>
							</select>
                                </div>
                                <div class="input-group mb-3">
                            <input type="password" name="senha" class="form-control" placeholder="Senha"
                                      aria-label="Senha"
                                        aria-describedby="basic-addon2" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-dark" name="Cadastrar" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php
$sql1 = "SELECT count(*) as Ativo FROM usuario  WHERE Condicao='Ativo' AND Acesso='Aluno'";
$sql2 = "SELECT count(*) as Inativo  FROM usuario WHERE Condicao='Inativo' AND Acesso='Aluno'";
$sql3 = "SELECT count(*) as Inadimplente FROM usuario WHERE Condicao='Inadimplente' AND Acesso='Aluno'";


//Executa o SQL
$result = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

//Prepara as contagens
$row1 = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();

?>
        <div class="grafico">
          <h1 id="apresentacao">ACESSO AOS <span class="alun">GRÁFICOS</span></h1>
            <canvas id="myChart"></canvas>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

        <script type="text/javascript">
        var ctx = document.getElementById("myChart");
        var valores = [<?php echo $row1["Ativo"] ?>, <?php echo $row2["Inativo"] ?>,
            <?php echo $row3['Inadimplente'] ?>
        ];
        var tipos = ["Ativo", "Inativo", "Inadimplente"];

        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: tipos,
                datasets: [{
                    label: "usuario",
                    data: valores,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                    ]
                }]
            }
        });
        </script>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

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