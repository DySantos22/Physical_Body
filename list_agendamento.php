<?php
session_start();

include 'conexao.php';
include_once 'config_pdo.php';

$id_aluno = $_SESSION['id'];

$query_events = "SELECT * FROM agendamento WHERE ID_aluno = '$id_aluno' AND status = 'Aguardando'";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['ID_agendamento'];
    $id_aluno = $row_events['ID_aluno'];
    $title = $row_events['Titulo'];
    $cor = $row_events['cor'];
    $comeco = $row_events['Data_agendamento'];
    $fim = $row_events['fim'];
    
    $eventos[] = [
        'id' => $id, 
        'id_aluno' =>$id_aluno,
        'title' => $title, 
        'color' => $cor, 
        'start' => $comeco, 
        'end' => $fim, 
        ];
}

echo json_encode($eventos);