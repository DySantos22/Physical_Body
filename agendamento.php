<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/personalizado.css">
        <title>Agendamento</title>
        <script src='scripts/core/main.min.js'></script>
        <script src='scripts/interaction/main.min.js'></script>
        <script src='scripts/daygrid/main.min.js'></script>
        <script src='scripts/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <link rel="icon" href="images/TCC-logo.png" />
        <script src="scripts/agenda.js"></script>
    </head>
    <body>
        <div class="ps-3 pt-2 seta">
            <a href="principal.php">
                <img src="images/seta-esquerda.svg">
            </a>
        </div>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div id='calendar'></div>

        <!-- modal de visualizar e editar -->
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes do agendamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="visevent">
                            <dl class="row">
                                <dt class="col-sm-3">Tipo de agendamento</dt>
                                <dd class="col-sm-9" id="title"></dd>

                                <dt class="col-sm-3">Início da avaliação</dt>
                                <dd class="col-sm-9" id="comeco"></dd>

                                <dt class="col-sm-3">Fim da avaliação</dt>
                                <dd class="col-sm-9" id="fim"></dd>
                            </dl>
                            <button class="btn btn-warning btn-canc-vis">Editar</button>
                            <a href="" id="apagar_agendamento" class="btn btn-danger">Cancelar agendamento</a>
                        </div>
                        <div class="formedit">
                            <span id="msg-edit"></span>
                            <form id="editevent" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" >
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tipo de agendamento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Cor</label>
                                        <input type="text" name="cor" class="form-control" id="cor" value="#FF4500">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="comeco" class="form-control" id="comeco" onkeypress="DataHora(event, this)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-warning">Salvar</button>                                    
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- modal de cadastro -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agende sua avaliação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="msg-cad"></span>
                        <form id="addevent" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tipo de agendamento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" value="Avaliacao" readonly>
                                </div>
                            </div>
                            <div class="form-group row" hidden>
                                <label class="col-sm-2 col-form-label">Cor</label>
                                    <input type="text" name="cor" class="form-control" id="cor" value="#FF4500">
                                </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Horário de inicio</label>
                                <div class="col-sm-10">
                                    <input type="text" name="comeco" class="form-control" id="comeco" onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ">
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Agendar</button>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
