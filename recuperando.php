<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar_secundario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Esqueci minha senha</title>
</head>

<body>
    <header>
        <nav>
            <a class="nav-logo" href="index.html">Physical Body</a>
        </nav>
    </header>

    <main>
        <!-- Modal do Esqueci a Senha -->
        <div class="modal_recuperar">
            <form action="recuperando_senha.php" name="formulario" method="post">
                <div class="modal-dialog" id="modal_recuperar" tabindex="-1" role="dialog"
                    aria-labelledby="Recuperar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Recuperar Senha">Recuperar Senha</h5>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="email" class="form-control" placeholder="Email"
                                        aria-label="Email" aria-describedby="basic-addon"
                                        value="<?php echo $_GET['email']; ?>" required>
                                </div>
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="senha" id="senha" class="form-control"
                                            placeholder="Senha Nova" aria-label="senha" aria-describedby="basic-addon2" minlength="8"
                                            required>
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
</body>

</html>