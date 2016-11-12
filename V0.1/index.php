<?php session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
<?php 	try{
			$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur : ' . $e->getMessage());
		}
		try{
			$dbb = new PDO('mysql:host=localhost;dbname=loginpassword; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur: ' . $e->getMessage());
		}
		if(isset($_SESSION['ID'])){
		$jointure = $dbb->prepare('SELECT ID_proprietaire FROM super_admin WHERE ID_proprietaire = ?');
		$jointure->execute(array($_SESSION['ID']));
	$donnee = $jointure->fetch();
	}
	 ?>
	<title></title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootsrap.css" media="screen" title="no title">
	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js">

	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 Optional theme
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 Latest compiled and minified JavaScript
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script><script type="text/javascript" src="script/script.js"></script>
--></head>
<body>
<?php
	include('includeIndex/header.php');

 	// 'TO DO' Changer la requete pour l'admin
 	/*echo $donees['ID'] . " " . $donnee['ID_proprietaire'];*/
 	if(isset($_SESSION['ID']) && isset($donnee['ID_proprietaire'])){
 	if($_SESSION['ID'] == $donnee['ID_proprietaire']){
	include('includeIndex/lien_edition_article.php');
	}}
	include('includeIndex/formrecherche.php');
	include('includeIndex/affichagearticle.php');
	include('includeIndex/footer.php');
  ?>




</body>
</html>
