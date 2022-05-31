<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>RADIUS <?=$radius_ver?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=$url?>/radiuscdn/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=$url?>/radiuscdn/css/main.css">
<!--===============================================================================================-->
<style>
	.my-custom-scrollbar {
		position: relative;
		height: 400px;
		overflow: auto;
	}
	.table-wrapper-scroll-y {
		display: block;
	}
	.wp-siteLoader {
		width: 2rem;
		height: 2rem;
		border: 5px solid #f3f3f3;
		border-top: 6px solid #9c41f2;
		border-radius: 100%;
		margin: auto;
		visibility: visible;
		animation: spin 1s infinite linear;
	}
	@keyframes  spin {
		from {
			transform: rotate(0deg);
		}
		to {
			transform: rotate(360deg);
		}
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 row" style="padding-top: 3em;">
				<div class="col-md-12">
				<div align="right" style="margin-top: 1em;"><button class="btn btn-danger" onclick="location='/radius/logout';" style="font-size: 0.7em;">Logout</button></div>
					<h4 class="text-center font-weight-bold">RADIUS <span style="font-size: 0.6em;"><?=$radius_ver?></span></h4>
				</div>
				<div class="col-md-12">
					<hr />
					<div id="msg" style"display:none;" align="center"></div>
					<div align="center" id="root"></div>
				</div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?=$url?>/radiuscdn/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/radiuscdn/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=$url?>/radiuscdn/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/radiuscdn/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/radiuscdn/vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$url?>/radiuscdn/js/radius.js"></script>

</body>
</html>