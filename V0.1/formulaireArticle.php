<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>

<form action="Editionarticlesql.php" method="POST" style="width: 60%; margin-left:20%">
 	<fieldset>
 		<input type="text" name="titre" placeholder="Titre de l'article">
 		<textarea name="contenue" style="min-width: 30%;min-height: 200px" placeholder="Contenue"></textarea>
 		<input type="Auteur" name="auteur" placeholder="Auteur">
 		<input type="text" name="image">
 		<button>Valider</button>
 	</fieldset>
</form>

</body>
</html>