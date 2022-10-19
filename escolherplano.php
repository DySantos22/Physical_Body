<?php
session_start();
// Include configuration file  
require_once 'config.php'; 
include 'conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>Selecione o seu plano</title>
<meta charset="utf-8">
<link rel="icon" href="images/TCC-logo.png" />
<link href="css/escolherplano.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">
	<h1>Escolha seu plano!</h1>
	<div class="wrapper">
        <!-- Display errors returned by checkout session -->
		<div class="d-flex justify-content-around flex-wrap" id="paymentResponse">
		<?php 
			$results = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=1");
			$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
		?>
			<div class="col__box">
			  <h5><?php echo $row['Nome_plano'] ?></h5>
				<h6>Preço: <span> R$<?php echo $row['Preco'] ?> </span> </h6>
			
				<!-- Buy button -->
				<div id="buynow">
					<button class="btn__default" id="payButton"> Assinar agora </button>
				</div>
            </div>
            
            <?php 
			    $results2 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=2");
			    $row2 = mysqli_fetch_array($results2,MYSQLI_ASSOC);
		    ?>
            <div class="col__box">
			    <h5><?php echo $row2['Nome_plano'] ?></h5>
				    <h6>Preço: <span> R$<?php echo $row2['Preco'] ?> </span> </h6>
			
				    <!-- Buy button -->
				    <div id="buynow">
					    <button class="btn__default" id="payButton2"> Assinar agora </button>
				    </div>
			</div>

            <?php 
			    $results3 = mysqli_query($conn,"SELECT * FROM plano WHERE ID_plano=3");
			    $row3 = mysqli_fetch_array($results3,MYSQLI_ASSOC);
		    ?>
            <div class="col__box">
			  <h5><?php echo $row3['Nome_plano'] ?></h5>
				<h6>Preço: <span>R$<?php echo $row3['Preco'] ?> </span> </h6>
			
				<!-- Buy button -->
				<div id="buynow">
					<button class="btn__default" id="payButton3"> Assinar agora </button>
				</div>
			</div>
        </div>
	</div>	

<script>
var buyBtn = document.getElementById('payButton');
var buyBtn2 = document.getElementById('payButton2');
var buyBtn3 = document.getElementById('payButton3');

var responseContainer = document.getElementById('paymentResponse');    
// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
			Name:"<?php echo $row['Nome_plano']; ?>",
			ID:"<?php echo $row['ID_plano']; ?>",
			Price:"<?php echo $row['Preco']; ?>",
        }),
    }).then(function (result) {
        return result.json();
    });
};

var createCheckoutSession2 = function (stripe) {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 2,
			Name:"<?php echo $row2['Nome_plano']; ?>",
			ID:"<?php echo $row2['ID_plano']; ?>",
			Price:"<?php echo $row2['Preco']; ?>",
        }),
    }).then(function (result2) {
        return result2.json();
    });
};

var createCheckoutSession3 = function (stripe) {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 3,
			Name:"<?php echo $row3['Nome_plano']; ?>",
			ID:"<?php echo $row3['ID_plano']; ?>",
			Price:"<?php echo $row3['Preco']; ?>",
        }),
    }).then(function (result3) {
        return result3.json();
    });
};

// Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Assinar agora';
};

var handleResult2 = function (result2) {
    if (result2.error) {
        responseContainer.innerHTML = '<p>'+result2.error.message+'</p>';
    }
    buyBtn2.disabled = false;
    buyBtn2.textContent = 'Assinar agora';
};

var handleResult3 = function (result3) {
    if (result3.error) {
        responseContainer.innerHTML = '<p>'+result3.error.message+'</p>';
    }
    buyBtn3.disabled = false;
    buyBtn3.textContent = 'Assinar agora';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo ''; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Processando...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});

buyBtn2.addEventListener("click", function (evt) {
	
    buyBtn2.disabled = true;
    buyBtn2.textContent = 'Processando...';
    createCheckoutSession2().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult2);
        }else{
            handleResult2(data);
        }
    });
});

buyBtn3.addEventListener("click", function (evt) {
    buyBtn3.disabled = true;
    buyBtn3.textContent = 'Processando...';
    createCheckoutSession3().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult3);
        }else{
            handleResult3(data);
        }
    });
});
</script>

</body>
</html>