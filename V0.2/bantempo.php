<?php session_start(); 

	if(isset($_GET['azef']) AND isset($_POST['heure']) AND isset($_POST['date'])){
			include "include/connexion_base.php";
			include "include/fonctionUtile.php";
			$verif = $dbh->prepare('SELECT * FROM users WHERE ID_user = ?');
			$verif->execute(array($_GET['azef']));
			$data = $verif->fetch();
			$temps = $_POST['date']." ".$_POST['heure'];
			var_dump($temps);
			echo $data['email']." ".$data['pseudo'];

		if(isset($data['email']) OR isset($data['pseudo'])){
			$new_ban = $dbh->prepare('INSERT iNTO ban (banni, ID_user, timing) VALUES (:banni, :id, :timestampss)');
			$new_ban->execute(array(
				'banni' => true,					
				'id' => $_GET['azef'],
				'timestampss' => $temps
				));
			var_dump($new_ban);
			go('index.php');

		}else{
			echo "bloque ici";
		}

	}else{
		echo "bloque là";
	}

?>
