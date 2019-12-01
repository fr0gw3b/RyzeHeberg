<!DOCTYPE html>
<html lang="en">
<head>
	<title>RyzeHeberg - Maintenance</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/css/util.css">
	<link rel="stylesheet" type="text/css" href="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
			Maintenance
			</h3>

			<p class="txt-center l1-txt2 p-b-60">
				Notre site internet est en maintenance
			</p>
			<p class="txt-center l1-txt2 p-b-60">
				Retour dans quelques minutes
			</p>

		</div>

		<span class="s1-txt3 txt-center">
			@ 2019 RyzeHeberg. Désigné par ColorLib
		</span>
		
	</div>

	<!-- Modal Login -->
	<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="modal-subscribe where1-parent bg0 bor2 size4 p-t-54 p-b-100 p-l-15 p-r-15">
				<button class="btn-close-modal how-btn2 fs-26 where1 trans-04">
					<i class="zmdi zmdi-close"></i>
				</button>

				<div class="wsize1 m-lr-auto">
					<h3 class="m1-txt1 txt-center p-b-36">
						<span class="bor1 p-b-6">Subscribe</span>
					</h3>

					<p class="m1-txt2 txt-center p-b-40">
						Follow us for update now!
					</p>

					<form class="contact100-form validate-form">
						<div class="wrap-input100 m-b-10 validate-input" data-validate = "Name is required">
							<input class="s1-txt4 placeholder0 input100" type="text" name="name" placeholder="Name">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 m-b-20 validate-input" data-validate = "Email is required: ex@abc.xyz">
							<input class="s1-txt4 placeholder0 input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
						</div>

						<div class="w-full">
							<button class="flex-c-m s1-txt2 size5 how-btn1 trans-04">
								Get Updates
							</button>
						</div>
					</form>

					<p class="s1-txt5 txt-center wsize2 m-lr-auto p-t-20">
						And don’t worry, we hate spam too! You can unsubcribe at anytime.
					</p>
				</div>
			</div>

		</div>
	</div>

	

<!--===============================================================================================-->	
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/bootstrap/js/popper.js"></script>
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/countdowntime/moment.min.js"></script>
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/countdowntime/countdowntime.js"></script>
	<script>
var d1 = new Date('October 24, 2019 16:00:00');
var d2 = new Date();
var dDiff = new Date(d1 - d2);
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: dDiff.getMonth(),
			endtimeDate: (dDiff.getDate() - 1),
			endtimeHours: (dDiff.getHours() - 1),
			endtimeMinutes: (dDiff.getMinutes() - 1),
			endtimeSeconds: (dDiff.getSeconds() - 1),
			timeZone: "" 
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/themes/<?php echo $_ENV['APP_THEME'];?>/maintenance/js/main.js"></script>

</body>
</html>