<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/profil.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Actu Manga</title>
	<?php try{
			$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;chaarset=utf8;', 'root', 'M+D=cdna4');
		}catch(Exception $e){
				die('erreur, ' . $e->getMessage());
			} 
			$log = $dbh->prepare('SELECT pseudo, DATE_FORMAT(date_inscription, \'%d/%m/%Y à %Hh%imin%ss\') AS date_inscription FROM log WHERE login = ?');
			$log->execute(array($_SESSION['login']));
			$donnees = $log->fetch(); 
			 ?>
</head>
<body>
	<?php include('includeIndex/header.php'); ?>
<div class="container bis">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-7 " id="but">
			<a href="UpdateProfil.php" class="btn btn-default">Update</a>
		</div>
		<div class="col-sm-8">

		</div>
	</div>
	<div class="row" >
		<div class="col-sm-offset-2 col-sm-3 log"><h4>Email: </h4><strong><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?></strong></div>
		<div class="col-sm-offset-2 col-sm-3 log"><h4>Pseudo: </h4><strong><?php if(isset($donnees['pseudo'])){echo $donnees['pseudo'];} ?></strong></div>

	</div>
 	<div class="row">
		<div class="col-sm-offset-2 col-sm-3"><h4>Password: </h4><?php if(isset($_SESSION['password'])){echo $_SESSION['password'];} ?></div>
	</div>
	<div class="row ">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="row bisis">
				<div class="col-sm-3 sisi"><h4>inscription: </h4><strong><?php if(isset($donnees['date_inscription'])){echo $donnees['date_inscription'];} ?></strong></div>
				<?php
				try{ 
					$dbb = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', 'M+D=cdna4');
				}catch(Exception $e){
					die('erreu, ' . $e->getMessage());
				}
					$jointure = $dbb->prepare('SELECT COUNT(*) AS NbCom FROM commentaires WHERE auteur = ?');
					$jointure->execute(array($_SESSION['login']));
					$donne = $jointure->fetch();
				 ?> 

		
			</div>
			<div class="row"><div class="col-sm-offset-9"><?php if(isset($donnees['pseudo'])){echo "Nombre d'article commenté:<strong>" . $donne['NbCom'] . "</strong>";} ?></div>
			</div>
	</div>
		</div>
	</div>
</div>
</body>
</html>