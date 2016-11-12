<?php session_start();
include_once('include/fonctionUtile.php');
	if(isset($_SESSION['ID'])){
		
		include_once('include/connexion_base.php');
		$recup = $dbh->prepare('SELECT * FROM super_user WHERE ID_user = ?');
		$recup->execute(array($_SESSION['ID']));
		$infoData = $recup->fetch();
		
		if($_SESSION['ID'] != $infoData['ID_user']){
		
			if(isset($_GET['billet'])){
			$supression = $dbh->prepare('DELETE FROM articles WHERE ID = ?');
			$supression->execute(array($_GET['billet']));
			echo $_GET['billet'];
			go('index.php?admin=true');
			}else{
				go('index.php?errors=true');
			}

		}else{
			go('index.php?admin=false');
		}

	}else{
		go('index.php?admin=false');
}
		
		
 ?>