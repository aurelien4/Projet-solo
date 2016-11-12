<?php session_start();
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur, '. $e->getMessage());
	}
 ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title></title>
</head>
<body>
	<?php include('includeIndex/header.php'); ?>
<div class="containerins">
	<form class="form-block" action="UpdateProfil.php" method="POST">
		<fieldset><legend>UpdateProfil</legend>
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
		<?php if( isset($_POST['login']) &&  isset($_POST['pseudo']) &&  isset($_POST['pass'])){
			if($_POST['login']!= null && $_POST['pseudo'] != null && $_POST['pass'] != null){
			$update = $dbh->prepare('UPDATE log SET login = :log, pseudo = :pseudo, password = :pass WHERE login = :session ');
			$update->execute(array(
				'log' => $_POST['login'],
				'pseudo' => $_POST['pseudo'],
				'pass' => md5($_POST['pass']),
				'session' => $_SESSION['login']
				));
			}elseif($_POST['login'] != null && $_POST['pseudo'] != null){
	$update = $dbh->prepare('UPDATE log SET login = :log, pseudo = :pseudo WHERE login = :session ');
			$update->execute(array(
				'log' => $_POST['login'],
				'pseudo' => $_POST['pseudo'],
				'session' => $_SESSION['login']
				));
		
			}elseif($_POST['login'] != null && $_POST['pass']){
	$update = $dbh->prepare('UPDATE log SET login = :log, password = :pass WHERE login = :session ');
			$update->execute(array(
				'log' => $_POST['login'],
				'pass' => md5($_POST['pass']),
				'session' => $_SESSION['login']
				));
		
			}elseif($_POST['pseudo'] != null && $_POST['pass'] != null){
	$update = $dbh->prepare('UPDATE log SET  pseudo = :pseudo, password = :pass WHERE login = :session ');
			$update->execute(array(
				'pseudo' => $_POST['pseudo'],
				'pass' => md5($_POST['pass']),
				'session' => $_SESSION['login']
				));
		
			}elseif($_POST['login'] != null){
	$update = $dbh->prepare('UPDATE log SET login = :log WHERE login = :session ');
			$update->execute(array(
				'log' => $_POST['login'],
				'session' => $_SESSION['login']
				));
		
			}elseif($_POST['pseudo'] != null){
	$update = $dbh->prepare('UPDATE log SET pseudo = :pseudo WHERE login = :session ');
			$update->execute(array(
				'pseudo' => $_POST['pseudo'],
				'session' => $_SESSION['login']
				));
		
			}elseif($_POST['pass'] != null){
			$update = $dbh->prepare('UPDATE log SET password = :pass WHERE login = :session ');
			$update->execute(array(
				'pass' => md5($_POST['pass']),
				'session' => $_SESSION['login']
				));
				
			}
			}else{ echo "bug";} ?>
</form>
</body>
</html>