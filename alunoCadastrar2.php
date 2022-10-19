<?php 
session_start();

//Só administrador pode acessar o programa.
if($_SESSION['acesso']=="Admin"){

//Faz a conexão com o BD.
require 'conexao.php';

//Pegando os dados inseridos
$termo = 'v1';
$sexo = $_SESSION['sexo'];
$email = $_SESSION['email_aluno'];
$cpf = $_SESSION['cpf'];
$telefone = $_SESSION['celular']; 
$nascimento = $_SESSION['nascimento'];
$plano = $_SESSION['plano'];
$matricula = rand(100000, 999999);

//Pegando Dia atual
$data = new \DateTime('America/Sao_Paulo');
$expiracao = new \DateTime('America/Sao_Paulo');

$sql4 = "SELECT * FROM usuario WHERE Email='$email'";
$result = $conn->query($sql4);
$row = $result->fetch_assoc();
$user_id = $row['ID_usuario'];

$sql = "SELECT * FROM plano WHERE ID_plano=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

  if($row['Nome_plano'] == $plano){

      $id_plano = $row['ID_plano'];
      $_SESSION['id_plano'] = $id_plano;

      // Transaction details 
      $preco = $row['Preco'];
      $_SESSION['preco'] = $preco;

      //Soma 1 mês no end (tempo do duração do plano)
      $expiracao = $expiracao->modify('+1 month')->format("Y/m/d H:i");
      $data = $data->format("Y/m/d H:i");


      $sql2 = "INSERT INTO aluno(ID_usuario, ID_plano, Matricula, CPF, Data_de_nascimento, Telefone, Sexo, Inicio, Expiracao, Data_matricula, Versao_termo) VALUES('$user_id', '$id_plano', '$matricula', '$cpf', '$nascimento', '$telefone', '$sexo', '$data', '$expiracao', '$data', '$termo')";

      $result = $conn->query($sql2);
      $_SESSION['email_aluno'] = $email;

      header('refresh:0; url=alunoCad_Pagamento.php');
      exit;
  }

  $sql2 = "SELECT * FROM plano WHERE ID_plano=2";
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_assoc();

  if($row2['Nome_plano'] == $plano){

    $id_plano = $row2['ID_plano'];
    $_SESSION['id_plano'] = $id_plano;

    // Transaction details 
    $preco = $row2['Preco'];
    $_SESSION['preco'] = $preco;

    //Soma 1 mês no end (tempo do duração do plano)
    $expiracao = $expiracao->modify('+3 month')->format("Y/m/d H:i");
    $data = $data->format("Y/m/d H:i");


    $sql2 = "INSERT INTO aluno(ID_usuario, ID_plano, Matricula, CPF, Data_de_nascimento, Telefone, Sexo, Inicio, Expiracao, Data_matricula, Versao_termo) VALUES('$user_id', '$id_plano', '$matricula', '$cpf', '$nascimento', '$telefone', '$sexo', '$data', '$expiracao', '$data', '$termo')";

    $result2 = $conn->query($sql2);
    $_SESSION['email_aluno'] = $email;

    header('refresh:0; url=alunoCad_Pagamento.php');
    exit;
}

$sql3 = "SELECT * FROM plano WHERE ID_plano=3";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();

if($row3['Nome_plano'] == $plano){

  $id_plano = $row3['ID_plano'];
  $_SESSION['id_plano'] = $id_plano;

  // Transaction details 
  $preco = $row3['Preco'];
  $_SESSION['preco'] = $preco;

  //Soma 1 mês no end (tempo do duração do plano)
  $expiracao = $expiracao->modify('+1 year')->format("Y/m/d H:i");
  $data = $data->format("Y/m/d H:i");


    $sql2 = "INSERT INTO aluno(ID_usuario, ID_plano, Matricula, CPF, Data_de_nascimento, Telefone, Sexo, Inicio, Expiracao, Data_matricula, Versao_termo) VALUES('$user_id', '$id_plano', '$matricula', '$cpf', '$nascimento', '$telefone', '$sexo', '$data', '$expiracao', '$data', '$termo')";

  $result3 = $conn->query($sql2);
  $_SESSION['email_aluno'] = $email;

  header('refresh:0; url=alunoCad_Pagamento.php');
  exit;
}

}else{
  header('Location: index.html');
  }
?>