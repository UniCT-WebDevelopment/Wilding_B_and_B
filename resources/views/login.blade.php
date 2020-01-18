<!DOCTYPE html>
<html lang="it">
<head>
	<title>Login <?= $user ?></title>
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
			<div class="login100-more" style="background-image: url('reg/images/bg-02.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post" action="/login_v">
				{{ csrf_field() }}
					<span class="login100-form-title p-b-59">
                    Login {{$user}}
					</span>
					<input type="hidden" name="user" value= "{{ $user }}" />
					
					<div class="wrap-input100 validate-input" data-validate = "Inserisci un'email valida: nome@dominio.region">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Indirizzo email...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "La password è richiesta">
						<span class="label-input100">Password</span>
						<input class="input100" id="passww" type="password" name="pass" placeholder="* * * * * * * * ">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					
					
						<a href="#"> 
							<p  class="label-input100 link">Password dimenticata?</p>
						</a>
						<a href="<?= '/reg_'. substr($user,0,3); ?>"> 
							<p  class="label-input100 link">Registrati</p>
						</a>
					
				</form>
			</div>
		</div>
	</div>
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
<!--========================

</body>
</html>