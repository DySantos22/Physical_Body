<?php
session_start();
include_once 'config_pdo.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_comeco = str_replace('/', '-', $dados['comeco']);
$data_comeco_conv = date("Y-m-d H:i", strtotime($data_comeco));

$data_fim = str_replace('/', '-', $dados['comeco']);
$data_fim_conv = date("Y/m/d H:i", strtotime($data_fim . '+' . '20 minutes'));

$query_event = "UPDATE agendamento SET Titulo=:title, cor=:cor, Data_agendamento=:comeco, fim=:fim WHERE ID_agendamento=:id";

$update_event = $conn->prepare($query_event);
$update_event->bindParam(':title', $dados['title']);
$update_event->bindParam(':cor', $dados['cor']);
$update_event->bindParam(':comeco', $data_comeco_conv);
$update_event->bindParam(':fim', $data_fim_conv);
$update_event->bindParam(':id', $dados['id']);

if ($update_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Avaliação editada com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Avaliação editada com sucesso!</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: A Avaliação não foi editado com sucesso!</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);
