<?php
session_start();

require 'conexao.php';

if(isset($_POST['Atualizar'])){

$email = $_SESSION['email'];

$sql = "SELECT * FROM aluno WHERE Email_aluno = '$email'";
$resultado = mysqli_query($conn, $sql);
  
  //Verifica e encontra o aluno
  if(($resultado) AND ($resultado->num_rows != 0)){
    while($row = mysqli_fetch_assoc($resultado)){

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Dados</title>
    <link rel="icon" href="images/TCC-logo.png" />
    <link rel="stylesheet" href="css/form_principalatualizar.css">
</head>

<body>
    <section>
        <div>
            <form action="processoatualizar.php" method="post">
                <h3>Atualizar Dados</h3>
                <input type="hidden" name="id" value="<?php echo $row["ID_aluno"]; ?>">
                <input type="text" name="nome" value="<?php echo $row["Nome"]; ?>" placeholder="Seu nome"
                    autocomplete="off" required>
                <input type="email" name="email" value="<?php echo $row["Email_aluno"]; ?>" placeholder="Seu e-mail"
                    autocomplete="off" required>
                <input type="password" name="senha" placeholder="Sua senha" autocomplete="off" required>
                <input type="date" name="data" minlenght="10" maxlenght="10" onfocus="(this.type='date')"
                    onblur="if(!this.value) this.type='text'" value="<?php echo $row["Data_de_nascimento"]; ?>"
                    placeholder="Data de Nascimento" autocomplete="off" required>
                <input type="text" name="telefone" onkeypress="$(this).mask('(00) 00000-0000')"
                    value="<?php echo $row["Telefone"]; ?>" placeholder="Seu Telefone" autocomplete="off" required>
                <input type="submit" value="Atualizar">
            </form>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<?php }}} ?>

</html>