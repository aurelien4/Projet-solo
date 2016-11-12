<?php 
session_start();
	if(isset($_GET['ID_com'])){
		include_once "include/fonctionUtile.php";
		include_once "include/connexion_base.php";

		$verif = $dbh->prepare('SELECT * FROM commentaires WHERE ID = ?');
		$verif->execute(array($_GET['ID_com']));
		$data = $verif->fetch();
		if(isset($data['ID'])){
			$supr = $dbh->prepare('DELETE FROM commentaires WHERE ID = ?');
			$supr->execute(array($_GET['ID_com']));
			go('index.php?supr=true');

		}else{
		
			go('index.php?errors=true');
		}

	}else{
		echo "<h1>Une erreur est survenue";
	}
 ?>