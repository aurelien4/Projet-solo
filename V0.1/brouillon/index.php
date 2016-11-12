<?php session_start();
	$_SESSION['ID'] = 8;
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur, ' . $e->getMessage());
	}
	$appel = $dbh->query('SELECT ID FROM log');
	$donnees = $appel->fetch();
	$jointure = $dbh->query('SELECT ID_proprietaire	FROM super_admin INNER JOIN log ON super_admin.ID_proprietaire = log.ID
		WHERE super_admin.ID_proprietaire = 8');
	$donnee = $jointure->fetch();
	if(isset($donnee['ID_proprietaire'])){
	if($donnee['ID_proprietaire']){
		echo 'CA MARCHE!!!!!!';
	}else{
		echo 'fuck off';
	}
}else{
	echo 'base de MERDE!';
}



	 ?>
</body>
</html>