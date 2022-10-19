<?php
session_start();

include_once 'config_pdo.php';

date_default_timezone_set('America/Sao_Paulo');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_comeco = str_replace('/', '-', $dados['comeco']);
$data_comeco_conv = date("Y-m-d H:i:s", strtotime($data_comeco));

$data_fim = str_replace('/', '-', $dados['comeco']);
$data_fim_conv = date("Y/m/d H:i", strtotime($data_fim . '+' . '20 minutes'));

$id_aluno = $_SESSION['id'];
$status = 'Aguardando';

$query_event = "INSERT INTO agendamento (ID_aluno, Titulo, cor, Data_agendamento, fim, status) VALUES (:ID_aluno, :title, :cor, :comeco, :fim, :status)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':ID_aluno', $id_aluno);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':cor', $dados['cor']);
$insert_event->bindParam(':comeco', $data_comeco_conv);
$insert_event->bindParam(':fim', $data_fim_conv);
$insert_event->bindParam(':status', $status);

if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Avaliação agendada com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Avaliação agendada com sucesso!</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Avaliação não foi agendada com sucesso!</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);
