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

$id = $_GET['id'];

//Cria o SQL (consulte tudo da tabela usuarios)
$sql = "SELECT * FROM aluno INNER JOIN usuario ON aluno.ID_usuario = usuario.ID_usuario WHERE ID_aluno = $id";
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
    <title>Cadastro de série</title>
    <link rel="icon" href="images/TCC-logo.png" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/html_cadastro.css">
    <link rel="stylesheet" type="text/css" href="css/form_serie.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <main id="main">

        <div class="ps-3 pt-2 seta">
            <a href="avaliacoes.php">
                <img src="images/seta-esquerda.svg">
            </a>
        </div>

        <h1 id="titulo">Cadastro de série</h1>
        <h2 id="subtitulo">Aluno: <?= $row['Nome']?></h2>

        <div class="container">
            <div class="alert" id="alert" role="alert"></div>
            <form name="formulario">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exercicio">Exercicio</label>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $id ?>">
                        <input type="text" name="exercicio" class="form-control" id="exercicio" placeholder="Exercicio"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="repeticao">Repetição</label>
                        <input type="text" name="repeticao" class="form-control" id="repeticao" placeholder="Repetição"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" class="form-select" id="tipo" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="obs">Observação</label>
                        <input type="text" name="obs" class="form-control" id="obs" placeholder="Observação">
                    </div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>

        <?php
            //Cria o SQL (consulte tudo da tabela serie)
            $sql2 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'A'";
            //Executa o SQL
            $result2 = $conn->query($sql2);

            //Se a consulta tiver resultados
            if($result2->num_rows > 0) {
        ?>
        <!-- Tipo A -->
        <section id="visualizacao" class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Visualização da série</h2>
                        <a class="btn btn-danger" href="serieApagarTudo.php?id=<?= $id ?>">Apagar tudo</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Exercicio</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Observações</th>
                                        <th class="text-center">Ações</th>
                                        <?php
                                    while($row2 = $result2->fetch_assoc()){
                                ?>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center"><?= $row2['Exercicio']; ?></td>
                                        <td class="text-center"><?= $row2['Repeticao']; ?></td>
                                        <td class="text-center"><?= $row2['Tipo']; ?></td>
                                        <td class="text-center"><?= $row2['Observacao']; ?></td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <a id="editar" href="" data-bs-toggle="modal" data-bs-target="#modal_editar"
                                                data-id="<?=$row2['ID_serie']?>"
                                                data-exercicio="<?=$row2['Exercicio']?>"
                                                data-repeticao="<?=$row2['Repeticao']?>" data-tipo="<?=$row2['Tipo']?>"
                                                data-obs="<?=$row2['Observacao']?>">
                                                <img src='images/editar.svg' alt='Editar Usuário'>
                                            </a>
                                            <a href="serieExcluir.php?id_serie=<?= $row2['ID_serie']?>&id=<?= $id ?>">
                                                <img src="images/lixo.svg">
                                            </a>
                                        </td>
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
        <section id="visualizacao" class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Exercicio</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Observações</th>
                                        <th class="text-center d-flex justify-content-evenly">Ações</th>
                                        <?php
                                    while($row3 = $result3->fetch_assoc()){
                                ?>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center"><?= $row3['Exercicio']; ?></td>
                                        <td class="text-center"><?= $row3['Repeticao']; ?></td>
                                        <td class="text-center"><?= $row3['Tipo']; ?></td>
                                        <td class="text-center"><?= $row3['Observacao']; ?></td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <a id="editar" href="" data-bs-toggle="modal" data-bs-target="#modal_editar"
                                                data-id="<?=$row3['ID_serie']?>"
                                                data-exercicio="<?=$row3['Exercicio']?>"
                                                data-repeticao="<?=$row3['Repeticao']?>" data-tipo="<?=$row3['Tipo']?>"
                                                data-obs="<?=$row3['Observacao']?>">
                                                <img src='images/editar.svg' alt='Editar Usuário'>
                                            </a>
                                            <a href="serieExcluir.php?id_serie=<?= $row3['ID_serie']?>&id=<?= $id ?>">
                                                <img src="images/lixo.svg">
                                            </a>
                                        </td>
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
        <section id="visualizacao" class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Exercicio</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Observações</th>
                                        <th class="text-center">Ações</th>
                                        <?php
                                    while($row4 = $result4->fetch_assoc()){
                                ?>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center"><?= $row4['Exercicio']; ?></td>
                                        <td class="text-center"><?= $row4['Repeticao']; ?></td>
                                        <td class="text-center"><?= $row4['Tipo']; ?></td>
                                        <td class="text-center"><?= $row4['Observacao']; ?></td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <a id="editar" href="" data-bs-toggle="modal" data-bs-target="#modal_editar"
                                                data-id="<?=$row4['ID_serie']?>"
                                                data-exercicio="<?=$row4['Exercicio']?>"
                                                data-repeticao="<?=$row4['Repeticao']?>" data-tipo="<?=$row4['Tipo']?>"
                                                data-obs="<?=$row4['Observacao']?>">
                                                <img src='images/editar.svg' alt='Editar Usuário'>
                                            </a>
                                            <a href="serieExcluir.php?id_serie=<?= $row4['ID_serie']?>&id=<?= $id ?>">
                                                <img src="images/lixo.svg">
                                            </a>
                                        </td>
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
        <section id="visualizacao" class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Exercicio</th>
                                        <th class="text-center">Repetições</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Observações</th>
                                        <th class="text-center">Ações</th>
                                        <?php
                                    while($row5 = $result5->fetch_assoc()){
                                ?>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="text-center"><?= $row5['Exercicio']; ?></td>
                                        <td class="text-center"><?= $row5['Repeticao']; ?></td>
                                        <td class="text-center"><?= $row5['Tipo']; ?></td>
                                        <td class="text-center"><?= $row5['Observacao']; ?></td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <a id="editar" href="" data-bs-toggle="modal" data-bs-target="#modal_editar"
                                                data-id="<?=$row5['ID_serie']?>"
                                                data-exercicio="<?=$row5['Exercicio']?>"
                                                data-repeticao="<?=$row5['Repeticao']?>" data-tipo="<?=$row5['Tipo']?>"
                                                data-obs="<?=$row5['Observacao']?>">
                                                <img src='images/editar.svg' alt='Editar Usuário'>
                                            </a>
                                            <a href="serieExcluir.php?id_serie=<?= $row5['ID_serie']?>&id=<?= $id ?>">
                                                <img src="images/lixo.svg">
                                            </a>
                                        </td>
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

        <!-- Modal de edição -->
        <div class="modal_editar">
            <form action="serieEditar.php?id=<?=$id?>" method="post">
                <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="Editar"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="serie_editar">Editar exercício</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="text" id="input-id" name="id_editar" class="form-control"
                                        placeholder="id" aria-label="exercicio" aria-describedby="basic-addon2" hidden>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="input-exercicio" name="exercicio_editar" class="form-control"
                                        placeholder="Exercicio" aria-label="exercicio" aria-describedby="basic-addon2">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="input-repeticao" name="repeticoes_editar"
                                        class="form-control" placeholder="Repetições" aria-label="repeticao"
                                        aria-describedby="basic-addon2">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="tipo_editar" id="input-tipo" class="form-select" id="tipo_editar"
                                        value="">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" id="input-obs" name="obs_editar" class="form-control"
                                        placeholder="Observação" aria-label="obs" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-dark" name="Enviar" value="Editar">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript">
    //script para enviar os dados e dar refresh no MAIN
    $(document).ready(function () {
    $('#submit').click(function () {
        event.preventDefault();
        var ID_aluno = $('#id').val();
        var Exercicio = $('#exercicio').val();
        var Repeticao = $('#repeticao').val();
        var Tipo = $('#tipo').val();
        var Observacao = $('#obs').val();

        $('#alert').html('');
        if (Exercicio == '') {
            $('#alert').html('Colocar o exercicio.');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (Repeticao == '') {
            $('#alert').html('Colocar a repeticao.');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');
        if (Tipo == '') {
            $('#alert').html('Colocar a série.');
            $('#alert').addClass("alert-danger");
            return false;
        }

        $('#alert').html('');

        $.ajax({
            url: '/SerieCadastrar.php',
            method: 'POST',
            data: {
                ID_aluno: ID_aluno,
                Exercicio: Exercicio,
                Repeticao: Repeticao,
                Tipo: Tipo,
                Observacao: Observacao
            },
            success: function () {
                $('form').trigger("reset");
                setTimeout(function () {
                    $('#main').load("alunoSerie.php?id=<?=$id?>");
                }, 0);
            }
        });
    });

});    
  
            //Script para pegar os valores e passar para o modal
            $(document).on("click", "#editar", function () {
                var id = $(this).data('id');
                $(".modal-body #input-id").val(id);
                var exercicio = $(this).data('exercicio');
                $(".modal-body #input-exercicio").val(exercicio);
                var repeticao = $(this).data('repeticao');
                $(".modal-body #input-repeticao").val(repeticao);
                var tipo = $(this).data('tipo');
                $(".modal-body #input-tipo").val(tipo);
                var obs = $(this).data('obs');
                $(".modal-body #input-obs").val(obs);
            });
        </script>

    </main>

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

<?php
	//Se a consulta não tiver resultados	 2
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}

	//Fecha a conexão.	
	$conn->close();
    ?>

</html>