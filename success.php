<?php
session_start();
// Include configuration file 
require 'conexao.php';

    $chave = $_SESSION['chave'];
    $pageview = $_GET['getID']; 
	$selectproduct =mysqli_query($conn, "SELECT * FROM plano WHERE ID_plano = '$pageview'");
    $rowproduct =mysqli_fetch_array($selectproduct,MYSQLI_ASSOC); 			
			
    $payment_id = $statusMsg = '';
    $ordStatus = 'error';

	// Insert transaction data into the database 
    $start = new \DateTime('America/Sao_Paulo');
    $end = new \DateTime('America/Sao_Paulo');

    //Pegando ID

    $sql5 = "SELECT * FROM usuario INNER JOIN aluno ON usuario.ID_usuario = aluno.ID_usuario WHERE Chave='$chave'";
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    if($result5->num_rows>0){
        $id = $row5['ID_aluno'];
        $user_id = $row5['ID_usuario'];
    }

// Check whether stripe checkout session is not empty
if(!empty($_GET['session_id'])){
    $session_id = $_GET['session_id'];
    
    // Fetch transaction data from the database if already exists
    $sql = "SELECT * FROM pagamento WHERE ID_aluno = '$id'";
    $result = $conn->query($sql);

	if ( !empty($result->num_rows) && $result->num_rows > 0) {
        $orderData = $result->fetch_assoc();
        
        $paymentID = $orderData['ID_pagamento'];
        
        $ordStatus = 'success';
        $statusMsg = 'Seu Pagamento foi concluído!!';
    }else{
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';
        
        // KEY DA API DO STRIPE
        \Stripe\Stripe::setApiKey('');
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
        
        if(empty($api_error) && $checkout_session){
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            // Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            if(empty($api_error) && $intent){ 
                // Check whether the charge is successful
                if(($intent->status == 'succeeded') && ($pageview == '1')){
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;
                    
                    // Transaction details 
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    //Soma 1 mês no end (tempo do duração do plano)
                    $end = $end->modify('+1 month')->format("Y/m/d H:i");
                    $start = $start->format("Y/m/d H:i");

					$sql = "INSERT INTO pagamento(ID_aluno, Valor, Data_pagamento) VALUES('$id', '".$rowproduct['Preco']."', '$start')"; 
                    $sql2 = "UPDATE aluno SET ID_plano='$pageview', Inicio='$start', Expiracao='$end' WHERE ID_aluno='$id'";    
                    $sql3 = "UPDATE usuario SET Condicao='Ativo' WHERE ID_usuario='$user_id'";

                    $insert = $conn->query($sql);
                    $insert2 = $conn->query($sql2);
                    $insert3 = $conn->query($sql3);
                    $paymentID = $conn->insert_id;
                    
						$ordStatus = 'success';
						$statusMsg = 'Seu Pagamento foi concluído!!';

                    include 'emailpagamento.php';
                }

                 if(($intent->status == 'succeeded') && ($pageview == '2')){
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;
                    
                    // Transaction details 
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    //Soma 3 meses no end (tempo do duração do plano)
                    $end = $end->modify('+3 months')->format("Y/m/d H:i");
                    $start = $start->format("Y/m/d H:i");

					$sql = "INSERT INTO pagamento(ID_aluno, Valor, Data_pagamento) VALUES('$id', '".$rowproduct['Preco']."', '$start')"; 
                    $sql2 = "UPDATE aluno SET ID_plano='$pageview', Inicio='$start', Expiracao='$end' WHERE ID_aluno='$id'";   
                    $sql3 = "UPDATE usuario SET Condicao='Ativo' WHERE ID_usuario='$user_id'";

                    $insert = $conn->query($sql);
                    $insert2 = $conn->query($sql2);
                    $insert3 = $conn->query($sql3);
                    $paymentID = $conn->insert_id;
                    
						$ordStatus = 'success';
						$statusMsg = 'Seu Pagamento foi concluído!!';

                        include 'emailpagamento.php';

                }
                
                if(($intent->status == 'succeeded') && ($pageview == '3')){
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;
                    
                    //Soma 1 ano no end (tempo do duração do plano)
                    $end = $end->modify('+1 year')->format("Y/m/d H:i");
                    $start = $start->format("Y/m/d H:i");

					$sql = "INSERT INTO pagamento(ID_aluno, Valor, Data_pagamento) VALUES('$id', '".$rowproduct['Preco']."', '$start')"; 
                    $sql2 = "UPDATE aluno SET ID_plano='$pageview', Inicio='$start', Expiracao='$end' WHERE ID_aluno='$id'";
                    $sql3 = "UPDATE usuario SET Condicao='Ativo' WHERE ID_usuario='$user_id'";

                    $insert = $conn->query($sql);
                    $insert2 = $conn->query($sql2);
                    $insert3 = $conn->query($sql3);
                    $paymentID = $conn->insert_id;
                    
						$ordStatus = 'success';
						$statusMsg = 'Seu pagamento foi concluído!!';

                        include 'emailpagamento.php';

                }
            }else{
                $statusMsg = "Não conseguimos buscar os detalhes da transação. $api_error"; 
            }
            $ordStatus = 'success';
        }else{
            $statusMsg = "A transação falhou! $api_error"; 
        }
    }
}else{
	$statusMsg = "Requisição Inválida!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="icon" href="images/TCC-logo.png"/>
<title>Pagamento realizado</title>
<meta charset="utf-8">
<!-- Stylesheet file -->
<link href="css/pagamento.css" rel="stylesheet">
</head>
<body class="App">
        <div class="botao">
            <a href="deslogar.php" class="btn-link">
                <button class="button">VOLTAR</button>
            </a>
        </div>
</body>
</html>