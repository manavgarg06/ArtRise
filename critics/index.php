<?php
    session_start();
    include "../db_connect.php";
    if(isset($_SESSION['critics_id'])) {
      header('location: homepage/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ArtRise</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="./index.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	<a href="https://front.codes/" class="logo" target="_blank">
		<img src="../src/artRise.png" alt="logo">
	</a>

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form action="critic_login.php">
												<div class="form-group">
													<input type="email" name="logemail" class="form-style"
														placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style"
														placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<p class="mb-0 mt-4 text-left"><a href="#0" class="link">Forgot your
														password?</a></p>
												<button type="submit" class="btn mt-4">submit</button>
											</form>
											<p class="mb-0 mt-4 text-right"><a href="../users/index.php"
													class="link">Login as user</a></p>
										</div>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form action="critic_signup.php">
												<div class="form-group">
													<input type="text" name="logname" class="form-style"
														placeholder="Your Full Name" id="logname" autocomplete="off">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="email" name="logemail" class="form-style"
														placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style"
														placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<div class="form-group mt-2">
													<input type="text" name="logqualifi" class="form-style"
														placeholder="Your Qualification" id="logqualifi"
														autocomplete="off">
													<i class="input-icon uil uil-graduation-cap"></i>
												</div>
												<!-- <div class="form-group mt-2">
													<input type="text" name="logcontact" class="form-style"
														placeholder="Your Contact" id="logcontact" autocomplete="off">
													<i class="input-icon uil uil-mobile-android"></i>
												</div> -->

												<div class="form-group mt-2">
													<input type="text" name="logcontact" class="form-style" list="specialisations" 
														placeholder="Specialisation" id="logcontact" autocomplete="off" oninput="validateInput()">
													<i class="input-icon uil uil-star"></i>
													<datalist id="specialisations">
														<option value="writing">
														<option value="art">
														<option value="music">
														<option value="visarts">
													</datalist>
												</div>											
												<button type="submit" class="btn mt-4">submit</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
function validateInput() {
    var input = document.getElementById('logcontact').value;
    var options = document.getElementById('specialisations').options;
    var match = false;

    for (var i = 0; i < options.length; i++) {
        if (input === options[i].value) {
            match = true;
            break;
        }
    }

    if (!match) {
        document.getElementById('logcontact').value = '';
    }
}
</script>

</html>