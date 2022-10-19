<?php
session_start();

//Verifica se o usuário logou.
if(!isset ($_SESSION['email']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['email']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

unset($_SESSION['msg']);

//Cria as variáveis
$acesso = $_SESSION['acesso'];
$email = $_SESSION['email'];

  //Ligação com o BD
  require 'conexao.php';

  //Puxa as informações
  $sql = "SELECT * FROM usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario LEFT JOIN plano ON aluno.ID_plano = plano.ID_plano WHERE Email = '$email'";


  //Resultados
  $result = mysqli_query($conn, $sql);
  
  //Verifica e encontra o aluno
  if(($result) AND ($result->num_rows != 0)){
    while($row = mysqli_fetch_assoc($result)){
      $data = $row['Data_de_nascimento'];
      $data = date("d/m/Y", strtotime($data));

      $expiracao = $row['Expiracao'];
      $expiracao = date("d/m/Y", strtotime($expiracao));
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Tela Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/html_principal.css">
  <link rel="stylesheet" href="css/navbarlateral.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon" href="images/TCC-logo.png" />
</head>

<body>

  <!-- Navbar lateral -->
  <nav class="navigation">
    <ul>
      <!-- Home -->
      <li class="list active">
        <a href="principal.php">
          <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
          </span>
          <span class="title">Perfil</span>
        </a>
      </li>
      <!-- Botão que leva aos treinos -->
      <li class="list">
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

  <!-- Aqui é a parte do usuario no principal -->
  <main>
    <section>
      <form method="post" action="uploadfoto.php" enctype="multipart/form-data">
        <div class="personal-image">
          <label class="label">
            <input type="hidden" value="<?php $row['ID_usuario'];?>" name="id">
            <input type="hidden" value="<?php echo $row['Email']; ?>" name="email">
            <input type="file" name="perfil" accept=".png,.jpeg,.jpg,.svg"> <!-- Aqui ele pega a foto do usuario -->
            <figure class="personal-figure">
              <img src="images/avatar.svg" class="personal-figure">
              <img src="<?php echo 'users/'.$email.'/'.$row['Imagem']; ?>" name="avatar" class="personal-avatar">
              <figcaption class="personal-figcaption">
                <img src="images/camera.png"> <!-- Foto que aparece quando passa o mouse -->
              </figcaption>
              <!-- Foto padrão do avatar -->
              <div>
                <input type="submit" name="submit" id="submit" value="Salvar">
              </div>

            </figure>
          </label>
        </div>
      </form>
    </section>

    <!-- Tabela de Informações-->
    <section class="container">
        <div class="row justify-content-center">
          <div class="Informacoes">
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <button type="button" id="button_infor" data-toggle="collapse" data-target="#Informacao"
                    aria-expanded="false" aria-controls="collapseOne">
                    Informações
                  </button>
                </div>

                <div id="Informacao" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                  </div>
                  </thead>

                  <tbody>
                    <tr>
                      <td scope="row"><Strong>Nome:</strong></td>
                      <td class="dados"><?= $row['Nome']; ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>Email:</strong></td>
                      <td class="dados"><?= $row['Email']; ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>CPF:</strong></td>
                      <td class="dados"><?= $row['CPF']; ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>Nascimento:</strong></td>
                      <td class="dados"><?= $data ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>Celular:</strong></td>
                      <td class="dados"><?= $row['Telefone']; ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>Plano:</strong></td>
                      <td class="dados"><?= $row['Nome_plano']; ?></td>
                    </tr>
                    <tr>
                      <td scope="row"><Strong>Expiração:</strong></td>
                      <td class="dados"><?= $expiracao ?></td>
                    </tr>
                    <div scope="row">
                      <input type="button" href="" id="atualizar" data-toggle="modal" data-target="#Modal"
                        value="Atualizar">
                    </div>
                    <div class="button">
                      <input type="button" href="" id="cancelar" data-toggle="modal" data-target="#modal_cancelar"
                        value="Cancelar">
                    </div>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php if($row['Peso'] != NULL){ ?>
    <!-- Tabela de Avaliação -->
    <section class="container">
      <div class="row justify-content-center">
        <div class="Avaliacao">
          <div class="accordion2" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <button type="button" id="button_infor" data-toggle="collapse" data-target="#Avaliacao"
                  aria-expanded="false" aria-controls="collapseOne">
                  Avaliação
                </button>
              </div>

              <div id="Avaliacao" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table">
                </div>
                <thead>
                  <tr>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row"><Strong>Peso:</strong></td>
                    <td class="dados"><?= $row['Peso'] ?>kg</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Altura:</strong></td>
                    <td class="dados"><?= $row['Altura'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Peito:</strong></td>
                    <td class="dados"><?= $row['Peito'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Ombros:</strong></td>
                    <td class="dados"><?= $row['Ombros'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Abdomen:</strong></td>
                    <td class="dados"><?= $row['Abdomen'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Cintura:</strong></td>
                    <td class="dados"><?= $row['Cintura'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Biceps Direito:</strong></td>
                    <td class="dados"><?= $row['Biceps_direito'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Biceps esquerdo:</strong></td>
                    <td class="dados"><?= $row['Biceps_esquerdo'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Coxa direita:</strong></td>
                    <td class="dados"><?= $row['Coxa_direita'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Coxa esquerda:</strong></td>
                    <td class="dados"><?= $row['Coxa_esquerda'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Panturrilha direita:</strong></td>
                    <td class="dados"><?= $row['Panturrilha_direita'] ?>cm</td>
                  </tr>
                  <tr>
                    <td scope="row"><strong>Panturrilha esquerda:</strong></td>
                    <td class="dados"><?= $row['Panturrilha_esquerda'] ?>cm</td>
                  </tr>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </section>


    <!-- Modal do Atualizar -->
    <div class="modal_atualizar">
      <form action="processoatualizar.php" method="post">
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="modal_atualizar"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="atualizar_senha">Atualizar Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $row["ID_aluno"]; ?>"
                    aria-label="ID" aria-describedby="basic-addon2">
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="nome" class="form-control" placeholder="Nome"
                    value="<?php echo $row["Nome"]; ?>" aria-label="Nome" aria-describedby="basic-addon2"
                    autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Email"
                    value="<?php echo $row["Email"]; ?>" aria-label="Email" aria-describedby="basic-addon2"
                    autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name="senha" class="form-control" placeholder="Senha" aria-label="Senha"
                    aria-describedby="basic-addon2" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" name="telefone" class="form-control" placeholder="Telefone" aria-label="Telefone"
                    onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $row["Telefone"]; ?>"
                    aria-describedby="basic-addon2" autocomplete="off" required>
                </div>
              </div>

              <div class="modal-footer">
                <label for="submit">
                  <input type="submit" class="btn btn-primary" name="Atualizar" value="Atualizar">
                </label>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Modal do cancelamento de matricula -->
    <div class="modal_cancelar">
      <form action="cancelamento.php" method="post">
        <div class="modal fade" id="modal_cancelar" tabindex="-1" role="dialog" aria-labelledby="Cancelar"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Cancelar">Cancelar Matrícula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $row["ID_aluno"]; ?>"
                    aria-label="ID" aria-describedby="basic-addon2">
                </div>
                <p>Saiba que ao Confirmar, seu Plano conosco será desfeito.<br><br>
                  Tem certeza??</p>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-danger" name="Confirmar" value="Confirmar">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>

  <?php }} ?>

</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
  integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
  integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="scripts/navbarlateral.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>