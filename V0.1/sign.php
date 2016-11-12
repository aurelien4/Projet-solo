<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<script type="text/javascript" src="script/script.js"></script>
</head>
<body>
<div class="containerins">
	<form class="form-block" action="inscription.php" method="POST">
		<fieldset><legend>Inscription</legend>
		<div class="form-group">
				<input class="form-control" type="text" placeholder="Login" name="login"></input>
			</div>
		<div class="form-group">
				<input class="form-control" type="text" placeholder="Pseudo" name="pseudo"></input>
			</div>	
			<div class="form-group">
				<input class="form-control" type="password" placeholder="Mot de passe" name="pass"></input>
			</div>
		
			<button class="btn btn-default">Inscription</button>
		</fieldset>
		</form>
		</div>
</body>
</html>