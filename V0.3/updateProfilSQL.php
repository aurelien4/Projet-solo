<?php 
session_start();
include_once "include/fonctionUtile.php";
	if(isset($_POST['mail']) OR isset($_POST['pseudo']) OR isset($_POST['pass'])){
		include_once "include/connexion_base.php";

		$verifUser = $dbh->prepare('SELECT * FROM users WHERE email = ?');
		$verifUser->execute(array($_SESSION['mail']));
		$dataUser = $verifUser->fetch();
		if(isset($dataUser)){
/*			if($dataUser['email'] == $_POST['mail'] OR $dataUser['pseudo'] == $_POST['pseudo'] OR $dataUser['password'] == password_hash($_POST['pass'], PASSWORD_BCRYPT)){
*/				$mail = htmlspecialchars($_POST['mail']);
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$pass = htmlspecialchars($_POST['pass']);
				if($_POST['mail'] != null && $_POST['pseudo'] != null && $pass != $_POST['pass']){
					$update = $dbh->prepare('UPDATE users SET email = :mail, pseudo = :pseudo, password = :pass WHERE email = :session ');
					$update->bindparam('mail',$mail, PDO::PARAM_STR);
					$update->bindparam('pseudo',$pseudo, PDO::PARAM_STR);
					$update->bindparam('pass',password_hash($pass, PASSWORD_BCRYPT), PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					
					go('profil.php?update=1');	
				}else if($_POST['mail'] != null && $pass != $_POST['pass']){
					$update = $dbh->prepare('UPDATE users SET email = :mail, password = :pass WHERE email = :session ');
					$update->bindparam('mail',$mail, PDO::PARAM_STR);
					$update->bindparam('pass',md5($pass), PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					go('profil.php?update=2');
				}else if($_POST['mail'] != null && $_POST['pseudo'] != null){
					$update = $dbh->prepare('UPDATE users SET email = :mail, pseudo = :pseudo WHERE email = :session ');
					$update->bindparam('mail',$mail, PDO::PARAM_STR);
					$update->bindparam('pseudo',$pseudo, PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					go('profil.php?update=3');
				}else if($_POST['pseudo'] != null && $pass != $_POST['pass']){
					$update = $dbh->prepare('UPDATE users SET pseudo = :pseudo, password = :pass WHERE email = :session ');
					$update->bindparam('pseudo',$pseudo, PDO::PARAM_STR);
					$update->bindparam('pass',md5($pass), PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					go('profil.php?update=4');
				}else if($_POST['mail'] != null){
					$update = $dbh->prepare('UPDATE users SET email = :mail WHERE email = :session ');
					$update->bindparam('mail',$mail, PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					go('profil.php?update=5');
				}else if($_POST['pseudo'] != null){
					$update = $dbh->prepare('UPDATE users SET pseudo = :pseudo WHERE email = :session ');
					$update->bindparam('pseudo',$pseudo, PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					go('profil.php?update=6');
				}else if($_POST['pass'] != null){
					$pass = password_hash($pass, PASSWORD_BCRYPT);
					$update = $dbh->prepare('UPDATE users SET  password = :pass WHERE email = :session ');
					$update->bindparam('pass',$pass, PDO::PARAM_STR);
					$update->bindparam('session',$_SESSION['mail'], PDO::PARAM_STR);	
					$update->execute();
					echo password_hash($pass, PASSWORD_BCRYPT);
					go('profil.php?update=7');
				}else{
					go('UpdateProfil.php?vide=true');
				}

/*			}else{
				go('UpdateProfil.php?User=true');
			}
*/			}

	}else{
		go('index.php?errors=true');
	}
 ?>