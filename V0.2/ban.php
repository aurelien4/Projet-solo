<?php 
	session_start();

	if(isset($_GET['azee'])){
		include_once "include/connexion_base.php";
		include_once "include/fonctionUtile.php";
		$UserDelete = $_GET['azee'];

			$verif = $dbh->prepare("SELECT * FROM users WHERE ID = ?");
			$verif->execute(array($UserDelete));
			$data = $verif->fetch();

		if($data['ID'] == $UserDelete){?>
			
			<h1>zaeza</h1>
			<?php
			$supr = $dbh->prepare('DELETE FROM users WHERE ID = ?');
			$supr->execute(array($UserDelete));
			go('listeDesMembre.php');
		}else{
			echo 'data et user non similaire';
		}
	}else{
		echo 'isset bloque';
	}
 ?>