<?php session_start(); ?>
<?php if(isset($_SESSION['mail'])){ 
include_once "include/connexion_base.php";
?>

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
<div class="container">
	<?php include_once "include/header.php"; 
		include_once "include/fonctionUtile.php";
		$donneeUser = $dbh->prepare('SELECT * FROM users WHERE email = ?');
		$donneeUser->execute(array($_SESSION['mail']));
		$donnee = $donneeUser->fetch();
	?>
	<div class="row">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="row" style="background-color:yellow;">
				<div class="col-sm-9" >
							<h1>Profil des color.</h1>
						
				</div>
				<div class="col-sm-3"><a href="UpdateProfil.php" class="btn btn-default">Update Profil</a></div>

			</div>
			<div class="row">
							<div class="col-sm-offset-1 col-sm-2"><h5>Email:<?php echo $donnee['email']; ?></h5></div>
							<div class="col-sm-offset-4 col-sm-3"><h5>Pseudo:<?php echo $donnee['pseudo']; ?></h5></div>
			</div>
			<div class="row">
				<div class="col-sm-offset-1 col-sm-3">Password: Ou pas! </div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="background-color: red;"><h4>Check</h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5">
				<?php 
				if(isset($_SESSION['pseudo'])){
						$dataCom = $dbh->prepare('SELECT count(*) AS NbCom FROM commentaires WHERE auteur = ?');
						$dataCom->execute(array($_SESSION['pseudo']));
						$data = $dataCom->fetch();
					if($data['NbCom'] <= 1){
						echo "<p>Nombre de commentaire: ". $data['NbCom'];
					}else{
						echo "<p>Nombres de commentaires: ".$data['NbCom']; 
					} 
				} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{ 
		go('index.php?errors=true');

}
	?>

</body>
</html>