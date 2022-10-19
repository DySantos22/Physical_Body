<?php
session_start();

include_once './conexao.php';
include_once 'config_pdo.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$id_aluno = filter_input(INPUT_GET, 'id_aluno', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $query_event = "DELETE FROM agendamento WHERE ID_agendamento=:id";
    $delete_event = $conn->prepare($query_event);
    
    $delete_event->bindParam("id", $id);
    
    if($delete_event->execute()){
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">A avaliação foi apagado com sucesso!</div>';
        header("Location: agendamento.php");
    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: A avaliação não foi apagado com sucesso!</div>';
        header("Location: agendamento.php");
    }
} else {
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro: A avaliação não foi apagado com sucesso!</div>';
    header("Location: agendamento.php");
}
