<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Actu manga</title>
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="body" onload="index()">
	<?php
		include_once('include/connexion_base.php');
		if(isset($_SESSION['mail']) OR isset($_SESSION['ID'])){
		$admin = $dbh->prepare('SELECT * FROM super_users WHERE ID_user = ?');
		$admin->execute(array($_SESSION['ID']));
		$donnee = $admin->fetch();
		$article = $dbh->query('SELECT * FROM articles');
		$donnees = $article->fetch();
	}

		include_once('include/header.php');
		if(isset($_SESSION['ID']) && isset($donnee['ID_user'])){
 		if($_SESSION['ID'] == $donnee['ID_user']){
 			include_once('include/creationArticle.php');
 		}}
		include_once('include/articleOnIndex.php');
		/*include('include/footer.php');*/
	 ?>
	 <script type="text/javascript" src="script/script.js"></script>
	 <script type="text/javascript" src="script/scriptajax.js"></script>
</body>
</html>
