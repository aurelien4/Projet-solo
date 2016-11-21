<?php
include_once('include/fonctionUtile.php');
	if(isset($_POST['login']) OR isset($_POST['pass'])){
		session_start();

		include_once('include/connexion_base.php');

		$verifLog = $dbh->prepare('SELECT * FROM users WHERE email = ?');
		$verifLog->execute(array($_POST['login']));
		$verif = $verifLog->fetch();

		if($_POST['login'] == $verif['email'] AND password_verify($_POST['pass'], $verif['password'])){
		
			$join = $dbh->prepare('SELECT * FROM ban WHERE timing > NOW()');
			$join->execute(array($verif['ID_user']));
			$data = $join->fetch();
					
			if($data['ID_user'] != $verif['ID_user']){
			
			$_SESSION['ID'] = $verif['ID_user'];
			$_SESSION['mail'] = $verif['email'];
			$_SESSION['pseudo'] = $verif['pseudo'];
				go('index.php');
			}else{	
				var_dump($data['timing']);
				var_dump(date('Y-m-d H:i:s'));
				if($data['timing'] <= date('Y-m-d H:i:s')){
					$fin_de_ban = $dbh->execute('DELETE ban WHERE ID_user = ?');
					$fin_de_ban->execute(array($verif['ID_user']));

					$_SESSION['ID'] = $verif['ID_user'];
					$_SESSION['mail'] = $verif['email'];
					$_SESSION['pseudo'] = $verif['pseudo'];
						go('index.php');

				}else{
				echo "votre compte a éter suspendu jusqu'au ".$data['timing']." Retour a la page <a href='destroy.php'>d'accueil</a>" ; 
				}
		}
		}else{
			go('index.php?error=true');
		}
	}else{
		go('index.php');
	
	}
 ?>

