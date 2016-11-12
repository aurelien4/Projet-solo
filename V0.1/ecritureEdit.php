<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="Editersql.php?billet=<?php echo $_GET['billet'] ?>" method="POST">
	<fieldset>
		<input type="text" name="Titre" placeholder="Titre">
		<textarea name="contenue" placeholder="contenue ici..." style="min-height: 200px;min-width: 30%"></textarea>
		<input type="text" name="Auteur" placeholder="Auteur">
		<button>Valider</button>
	</fieldset>
</form>
</body>
</html>