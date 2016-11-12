<?php
include_once('include/fonctionUtile.php');
	if(isset($_POST['login']) OR isset($_POST['pass'])){
		session_start();

		include_once('include/connexion_base.php');

		$verifLog = $dbh->prepare('SELECT * FROM users WHERE email = ?');
		$verifLog->execute(array($_POST['login']));
		$verif = $verifLog->fetch();
		if($_POST['login'] == $verif['email'] OR password_verify($_POST['pass']) == $verif['password']){
			$_SESSION['ID'] = $verif['ID'];
			$_SESSION['mail'] = $verif['email'];
			$_SESSION['pseudo'] = $verif['pseudo'];
			header('location: index.php');
		}else{
			go('index.php?error=true');
		}
	}else{
		go('index.php');
	}
 ?>
