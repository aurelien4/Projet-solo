<!DOCTYPE html>
<html>
<head>
	<title>Actu manga</title>
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="body" onload="listener()">
	<?php include_once('include/header.php') ?>
<div class="container">
<div class="row">
	<div class="col-md-offset-3 col-md-6 col-xs-12">
	<form class="form-block" id="form" action="inscriptionSQL.php" method="POST">
		<fieldset>
		<legend>Inscription <p id="erreur"></p></legend>
		<div class="form-group">
				<input class="form-control" type="text" placeholder="Login" name="login"></input>
			</div>
		<div class="form-group">
				<input class="form-control" type="text" placeholder="Pseudo" name="pseudo"></input>
			</div>
			<div class="form-group">
				<input class="form-control pass" type="password" placeholder="Mot de passe" name="password"></input>
			</div>
		<div class="form-group">
				<input class="form-control pass" type="password" id="password" placeholder="Mot de passe" name="password2"></input>
				<span id="lab"></span>
			</div>

			<button class="btn btn-default" id="but">Inscription</button>
		</fieldset>
		</form>

	</div>
</div>
	</div>
	<script type="text/javascript" src="script/script.js"></script>
</body>
</html>
