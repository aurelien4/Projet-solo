<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;charset=utf8', 'root', 'M+D=cdna4');

	}catch(Exception $e){
		die('erreur ,' . $e->getMessage());
	}
	$account= $dbh->prepare('SELECT ID FROM log WHERE pseudo = ?');
	$account->execute(array($_POST['pseudo']));
	$donnee = $account->fetch();
	if(!isset($_POST['coche'])){
		$valide = 'false';
	}else{
		$valide = 'true';
	}
	$admin = $dbh->prepare('INSERT INTO super_admin (ID_proprietaire,Admin_validé, date_upgrade) VALUES (:idpro, :validation, NOW())');
	$admin->execute(array(
		'idpro' => $donnee['ID'],
		'validation' => $valide
		));
	echo $donnee['ID'] . " " . $valide;
 ?>