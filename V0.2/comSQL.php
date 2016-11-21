<?php
	session_start();
	include_once('include/fonctionUtile.php');
	if(isset($_POST['commentaire'])){
		include_once('include/connexion_base.php');

		var_dump($_SESSION['ID']);
		$user = $dbh->prepare('SELECT * FROM users WHERE ID_user = ?');
		$user->execute(array($_SESSION['ID']));
		$donnee = $user->fetch();

		if($_SESSION['ID'] == $donnee['ID_user']){
			$user->closeCursor();
			$com = $_POST['commentaire'];
			$id = $_GET['ID'];

			
				$ajout_de_com = $dbh->prepare('INSERT INTO commentaires (ID_article, pseudo, commentaire, date_commentaire) VALUES(:ID, :auteur, :commentaire, NOW())');
				$ajout_de_com->bindParam('ID', $id, PDO::PARAM_INT);
				$ajout_de_com->bindParam('auteur', $_SESSION['pseudo'], PDO::PARAM_STR);
				$ajout_de_com->bindParam('commentaire', $com, PDO::PARAM_STR);
				$ajout_de_com->execute();

				$articles = $dbh->prepare('SELECT nbCom FROM articles WHERE ID = ?');
				$articles->execute(array($_GET['ID']));
				$data = $articles->fetch();

				$increm = ++$data['nbCom'];
				$nombreCom = $dbh->prepare('UPDATE articles SET nbCom = :nbCom WHERE ID = :id');
				$nombreCom->bindParam('nbCom', $increm, PDO::PARAM_STR);
				$nombreCom->bindParam('id', $id, PDO::PARAM_INT);
				$nombreCom->execute();
				

				var_dump($increm);
				var_dump($articles);
				var_dump($nombreCom);

				go('index.php?com=true');
		}else{
				go('index.php?com=false');
		}

	}else{
		go('index.php?erros=true');
	}
 ?>
