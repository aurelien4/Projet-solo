<?php
//variable erreur

	if(isset($_POST['login']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password2'])){
				include_once('include/fonctionUtile.php');
		if(strlen($_POST['login']) >= 8){

			if(strlen($_POST['pseudo']) >= 5){

				if($_POST['password'] == $_POST['password2']){

					include_once('include/connexion_base.php');

					$dernierMur = $dbh->query('SELECT * FROM users');
					$tab = $dernierMur->fetch();
				if($_POST['login'] != $tab['email'] AND $_POST['pseudo'] != $tab['pseudo']){

					$mail = $_POST['login'];
					$pseudo = $_POST['pseudo'];
					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

					$inscription = $dbh->prepare('INSERT INTO users (email, pseudo, password, date_inscription) VALUES (:mail, :pseudo, :password, NOW())');
					$inscription->bindParam('mail', $mail, PDO::PARAM_STR);
					$inscription->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
					$inscription->bindParam('password', $password, PDO::PARAM_STR);
					$test = $inscription->execute();
					var_dump($test);
					if($test){
						echo 'là';
					}else{
						echo 'ici';
					}
					// go('Inscription.php?win=true');
				}else{
					// go('Inscription.php?already=true');
				}
				}else{
					// go('Inscription.php?errors=true');
				}

			}else{
				// go('Inscription.php?errors=true');
			}
		}else{
			// go('Inscription.php?errors=true');
		}
	}else{
		echo $_POST['login'];
		// go('Inscription.php?errors=true');
	}
 ?>
