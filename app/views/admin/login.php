<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?> | AduanMJII <?=$short_version?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=$url?>/admincdn/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=$url?>/admincdn/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('<?=$url?>/admincdn/images/wall-net.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="POST" action="<?=$url?>/admin/login" onsubmit="return login(this);">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div id="Error" style="display:none;"></div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button id="btnLogin" class="login100-form-btn">
						Sign In
					</button>
				</div>

			</form>

			<br />

			<div align="center">
				<a href="<?=$url?>">&larr; Back to AduanMJII</a>
			</div>

			<br />

			<div align="center">AduanMJII <?=$short_version?></div>
			<div align="center" style="font-size: 0.8em;">&copy; <?=gmdate('Y', time() + (3600*8))?> Node Team</div>
			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=$url?>/admincdn/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=$url?>/admincdn/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/admincdn/js/main.js"></script>
	<script>
		function login(form){
			var d = document;
			btnLogin = d.getElementById('btnLogin');
			btnLogin.innerHTML = "Signing in...";
			btnLogin.disabled = true;

			$.post({
				url: '<?=$url?>/admin/login',
				data: {
					username: form.username.value,
					pass: form.pass.value
				},
				success: function(data){
					data = JSON.parse(data);
					if(data.message != 'OK'){
						DisplayError(data.message);
						btnLogin.innerHTML = "Sign In";
						btnLogin.disabled = false;
					} else {
						window.location = "<?=$url?>/admin";
					}
				}
			});
			return false;
		}

		function DisplayError(message){
			$('#Error').addClass('alert alert-danger text-center');
			$('#Error').html(message);
			$('#Error').fadeIn();

			setTimeout(function(){
				$('#Error').fadeOut();
			}, 2000);
		}
	</script>

</body>
</html>