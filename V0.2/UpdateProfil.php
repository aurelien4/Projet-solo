<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Actu manga</title>
		<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<?php include_once "include/header.php" ?>
	
	<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6 col-xs-12">
			<legend>Update Profil</legend>
			<form action="updateProfilSQL.php" method="POST">
	
				<label>Email</label>
				<input type="Email" class="form-control" name="mail">
				<label>Pseudo</label>
				<input type="pseudo" class="form-control" name="pseudo">
				<label>password</label>
				<!-- TODO: faire cette partie en js -->
				<input type="password" class="form-control" name="pass">
				<?php if(isset($verifPass)){if($verifPass = true){
				?>
					<label>Nouveau password</label>
					<input type="password" name="pass">
					<input type="password" name="pass2">
					<button class="btn btn-default">Valider</button>
				<?php
					} }?>
					<button class="btn- btn-default">Valider</button>
			</form>


		</div>
	</div>
	</div>
</body>
</html>