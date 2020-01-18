<!DOCTYPE html>
<html lang="it">
<head>
	<title>Reigstrazione la tua casa!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="reg/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="reg/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="reg/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="reg/css/util.css">
	<link rel="stylesheet" type="text/css" href="reg/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('reg/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post" action="/ins_reg_alb">
				{{ csrf_field() }}
				<span class="login100-form-title p-b-59">
						Inserisci i dati per registrarti
				</span>
				<div class="wrap-input100 validate-input" data-validate="Il nome è richiesto">
					<span class="label-input100">Nome</span>
					<input class="input100" type="text" name="name" placeholder="Nome...">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Il cognome è richiesto">
					<span class="label-input100">Cognome</span>
					<input class="input100" type="text" name="surname" placeholder="Cognome...">
					<span class="focus-input100"></span>
				</div>
					
				<div class="wrap-input100 validate-input" data-validate="Inserisci un codice fiscale valido">
					<span class="label-input100">Codice fiscale</span>
					<input class="input100" type="text" name="cf" placeholder="Codice fiscale...">
					<span class="focus-input100"></span>
				</div>
						
				<div class="wrap-input100 validate-input" data-validate="Estremi pagamento è richiesto">
					<span class="label-input100">Tipo di pagameno</span>
					<span class="input-100">
						<select id="sceltaPagamento" onchange="gestisci()">
							<option value="1">Carta di credito</option>
							<option value="2" selected="selected">Conto corrente</option>
							<option value="3">Contanti</option>
						</select>
					</span>
					<input id="inputPagamento" style="display:none" class="input100" type="text" name="pagamento" placeholder="Estremo pagamento...">
					<span class="focus-input100"></span>
				</div>
					
				<div class="wrap-input100 validate-input" data-validate = "Inserisci un'email valida: nome@dominio.region">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Indirizzo email...">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Il contatto è richiesto">
					<span class="label-input100">Contatto</span>
					<input class="input100" type="text" name="contatto" placeholder="Contatto...">
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="L'username è richiesto">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Username...">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "La password è richiesta">
					<span class="label-input100">Password</span>
					<input class="input100" id="passww" type="password" name="pass" placeholder="* * * * * * * * ">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Ripeti password è richiesto">
					<span class="label-input100">Ripeti Password</span>
					<input class="input100" id="repeatPass" type="password" name="repeat-pass" placeholder="* * * * * * * *">
					<span class="focus-input100"></span>
				</div>

				<div class="flex-m w-full p-b-33">
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							<span class="txt1">
								Acetto i
								<a href="#" class="txt2 hov1">
									Termini dell'utente
								</a>
							</span>
						</label>
					</div>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" onclick="checkPass()">
							Registrami!
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<!--===============================================================================================-->
   <!-- password tes -->
   <script> 
		function checkPass(){
			//alert("entrato in checkpass");
			var pass = document.getElementById("passww").value;
			var repass = document.getElementById("repeatPass").value;	
			if (pass!= '' && repass != '' )
				if (pass != repass){
					alert("Le password non combaciano!\nReinseriscila");
					document.getElementById('repeatPass').value='';		
				}				
		}
		// OK MA C'E' UN BUG DA RISOLVERE - COMPARE ICONA "SPUNTA- VERDE"ANCHE QUANDO COMPARE l'ALERT 
		//Funzione selected 
		function gestisci(){
			var x = document.getElementById("sceltaPagamento").value;
			//alert("hai selezionato: "+ x);
			if ( x == 1 || x == 2)
				document.getElementById("inputPagamento").style.display = "inline";
			else
				document.getElementById("inputPagamento").style.display = "none";
				
		}
   </script>
					
	
<!--===============================================================================================-->
	<script src="reg/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="reg/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="reg/vendor/bootstrap/js/popper.js"></script>
	<script src="reg/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="reg/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="reg/vendor/daterangepicker/moment.min.js"></script>
	<script src="reg/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="reg/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="reg/js/main.js"></script>

</body>
</html>