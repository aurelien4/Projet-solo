<?php 
	session_start();
	include_once('include/fonctionUtile.php');
	if(isset($_POST['commentaire'])){
		include_once('include/connexion_base.php');
		

		$user = $dbh->prepare('SELECT * FROM users WHERE ID = ?');
		$user->execute(array($_SESSION['ID']));
		$donnee = $user->fetch();

		if($_SESSION['ID'] == $donnee['ID']){
			$user->closeCursor();
			$com = $_POST['commentaire'];
			$id = $_GET['ID'];
				$ajout_de_com = $dbh->prepare('INSERT INTO commentaires (ID_article, auteur, commentaire, date_commentaire) VALUES(:ID, :auteur, :commentaire, NOW())');
				$ajout_de_com->execute(array(
					'ID' => $id,
					'auteur' => $_SESSION['pseudo'],
					'commentaire' => $com
					));
				go('index.php?com=true');
		}else{
				go('index.php?com=false');
		}

	}else{
		go('index.php?erros=true');
	}
 ?>