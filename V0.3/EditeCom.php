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
<?php include "include/header.php";
 ?>
<div class="container">
<form class="form-control" action="EditeComSQL.php?ID_co=<?php echo $_GET['ID_com'];?>" method="POST">
		<label spellcheck>commentaire</label>
		<textarea class="form-control" name="commentaire" ></textarea>
		<button class="btn btn-default">Editer</button>
	</form>
</div>
</body>
</html>