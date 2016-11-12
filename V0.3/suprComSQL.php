<?php 
session_start();
	if(isset($_GET['auteur'])){
		include_once "include/fonctionUtile.php";
		include_once "include/connexion_base.php";

		$verif = $dbh->prepare('SELECT * FROM commentaires WHERE auteur = ?');
		$verif->execute(array($_GET['auteur']));
		$data = $verif->fetch();
		if(isset($data['ID'])){
			$supr = $dbh->prepare('DELETE FROM commentaires WHERE auteur = ?');
			$supr->execute(array($_GET['auteur']));
			go('index.php?supr=true');

		}else{
		
			go('index.php?errors=true');
		}

	}else{
		echo "<h1>Une erreur est survenue";
	}
 ?>