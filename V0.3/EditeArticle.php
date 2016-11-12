<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php include_once('include/header.php') ?>

<form action="EditeArticleSQL.php?billet=<?php echo $_GET['billet'] ?>" method="POST" style="width: 60%; margin-left:20%">
 	<fieldset>
 		<label>Titre</label>
 		<input type="text" class="form-control" name="Titre" placeholder="Titre de l'article">
 		<label spellcheck="true">Contenue</label>
 		<textarea name="contenue" class="form-control" rows="10"  placeholder="Contenue..."></textarea>
 		<label>Auteur</label>
 		<input type="Auteur" class="form-control" name="Auteur" placeholder="Auteur">
 		<label>Fichier(Image)</label>
 		<input type="file" class="form-control" name="image" >
 		<button>Valider</button>
 	</fieldset>
</form>
</form>
</body>
</html>