<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="images/TCC-logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/html_login.css">
    <link rel="stylesheet" href="css/navbar_secundario.css">
    <link rel="stylesheet" href="css/form_login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <header>
        <nav>
            <a class="nav-logo" href="index.html">Physical Body</a>
        </nav>
    </header>

    <main>
    <div class="login-container justify-content-center">
            <div class="login-box">
                <img src="images/minilogo.png" class="rounded mx-auto d-block"></a>
                <h2>LOGIN</h2>
                <?php
                    if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    } 
                ?>
                <form action="loginVerificacao.php" method="post">
                    <div class="user-box">
                        <input type="text" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="user-box">
                        <input type="password" name="senha" id="senha" placeholder="Senha" required>
                        <span class="eye" onclick="myFunction()">
                            <i id="hide1" class="fa fa-eye"></i>
                            <i id="hide2" class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    <div class="btn-esqueci">
                        <a href="" data-toggle="modal" data-target="#modal_recuperar">
                            Esqueci minha senha
                        </a>
                    </div>
                    <div class="btn-entrar">
                        <input type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal do Recuperar Senha -->
        <div class="modal_recuperar">
            <form action="recuperar_senha.php" method="post">
                <div class="modal fade" id="modal_recuperar" tabindex="-1" role="dialog"
                    aria-labelledby="Recuperar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Recuperar Senha">Recuperar Senha</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fechar">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="email" name="email_recuperar" class="form-control" placeholder="Email"
                                        aria-label="Email" aria-describedby="basic-addon2" required>
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

    </main>

    <footer>
    <section>
      <div class="main-footer">
        <div id="contato">
          <h1>FALE CONOSCO</h1>
          <div class="contato-detalhes">
            <a href="tel:+5521999999999">Celular: +55 (21) 99999-9999</a>
            <a href="mailto:Physicalbody00@gmail">Email: physicalbody00@gmail.com</a>
          </div>
          <div class="endereco-detalhes">
           <h1>ENDEREÇO</h1>
            <p>Praça da Bandeira, Zona Norte, Rio de Janeiro</p>
          </div>
        </div>
        <div class="redes-sociais">
          <h1>NOSSAS REDES</h1>
          <div class="sociallogos">
            <a href="#"><img src="images/instagram-icon.svg">Instagram</a>
            <a href="#"><img src="images/facebook-icon.svg">Facebook</a>
            <a href="#"><img src="images/twitter-icon.svg">Twitter</a>
          </div>
        </div>
      </div>
      <span>&copy; Physical Body Copyright 2009 All Rights Reserved</span>
    </section>
  </footer>
    <script src="scripts/login_password.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>