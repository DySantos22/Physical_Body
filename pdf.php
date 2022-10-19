<?php
session_start();

include './fpdf/fpdf.php';
require 'conexao.php';

$id = $_SESSION['id'];

$pdf = new FPDF();

$pdf->AddPage('P', 'A4');
$pdf->SetFont('Arial','B',16);
$pdf->Image('images/icon-gym.jpeg',10,5,20);
$pdf->Cell(195,10,utf8_decode('PHYSICAL BODY'),0,0,"C");
$pdf->Ln(15);

//SÉRIE A
$pdf->SetX(13);
$pdf->Cell(190,10,utf8_decode('Serie A'),0,0,"C");
$pdf->Ln(10);

$pdf->SetX(38);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(50,7,"Exercicio",1,0,"C");
$pdf->Cell(40,7,"Repeticoes",1,0,"C");
$pdf->Cell(40,7,"Observacoes",1,0,"C");
$pdf->Ln();

//Serie A
$sql2 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'A'";
//Executa o SQL
$result2 = $conn->query($sql2);

//Se a consulta tiver resultados
if($result2->num_rows > 0) {

  
      while($row2 = $result2->fetch_assoc()){
$pdf->SetX(38);
$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("{$row2['Exercicio']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row2['Repeticao']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row2['Observacao']}"),1,0,"C");
$pdf->Ln();
 } }


 //SÉRIE B
 $pdf->Ln();
 $pdf->SetX(13);
 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(190,10,utf8_decode('Serie B'),0,0,"C");
$pdf->Ln();

$pdf->SetX(38);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(50,7,"Exercicio",1,0,"C");
$pdf->Cell(40,7,"Repeticoes",1,0,"C");
$pdf->Cell(40,7,"Observacoes",1,0,"C");
$pdf->Ln();

$sql3 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'B'";
//Executa o SQL
$result3 = $conn->query($sql3);

//Se a consulta tiver resultados
if($result3->num_rows > 0) {

  
      while($row3 = $result3->fetch_assoc()){
$pdf->SetX(38);
$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("{$row3['Exercicio']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row3['Repeticao']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row3['Observacao']}"),1,0,"C");
$pdf->Ln();
 } }

 //SÉRIE C

 $pdf->Ln();
 $pdf->SetX(13);
 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(190,10,utf8_decode('Serie C'),0,0,"C");
$pdf->Ln();

$pdf->SetX(38);
$pdf->SetFont("Arial","B",10);
$pdf->Cell(50,7,"Exercicio",1,0,"C");
$pdf->Cell(40,7,"Repeticoes",1,0,"C");
$pdf->Cell(40,7,"Observacoes",1,0,"C");
$pdf->Ln();

 //Serie B
$sql4 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'C'";
//Executa o SQL
$result4 = $conn->query($sql4);

//Se a consulta tiver resultados
if($result4->num_rows > 0) {

  
      while($row4 = $result4->fetch_assoc()){
            $pdf->SetX(38);
            $pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("{$row4['Exercicio']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row4['Repeticao']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row4['Observacao']}"),1,0,"C");
$pdf->Ln();
  
 } }

  //SÉRIE D

  $pdf->Ln();
  $pdf->SetX(13);
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(190,10,utf8_decode('Serie D'),0,0,"C");
 $pdf->Ln(10);
 
 $pdf->SetX(38);
 $pdf->SetFont("Arial","B",10);
 $pdf->Cell(50,7,"Exercicio",1,0,"C");
 $pdf->Cell(40,7,"Repeticoes",1,0,"C");
 $pdf->Cell(40,7,"Observacoes",1,0,"C");
 $pdf->Ln();
 
 $sql5 = "SELECT * FROM serie WHERE ID_aluno = $id AND Tipo = 'D'";
 //Executa o SQL
 $result5 = $conn->query($sql5);
 
 //Se a consulta tiver resultados
 if($result5->num_rows > 0) {
 
   
       while($row5 = $result5->fetch_assoc()){
            $pdf->SetX(38);
            $pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("{$row5['Exercicio']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row5['Repeticao']}"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("{$row5['Observacao']}"),1,0,"C");
 $pdf->Ln();
  } }
 

$pdf->Output('D', 'Série.pdf');
?>