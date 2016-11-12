<?php session_start(); ?>
<?php
	include_once('include/fonctionUtile.php');
		if( isset($_POST['titre']) OR isset($_POST['contenue'])OR isset($_SESSION['pseudo']) OR isset($_POST['image'])){

			if(strlen($_POST['titre']) >= 5){
				if(strlen($_['pseudo']) >= 4){
					include_once('include/connexion_base.php');
					$verifAdmin = $dbh->prepare('SELECT * FROM super_users WHERE ID_user = ?');
					$verifAdmin->execute(array($_SESSION['ID']));
					$Admin = $verifAdmin->fetch();

					if($_SESSION['ID'] == $Admin['ID_user']){


		$titre = $_POST['titre'];
		$article = $_POST['contenue'];
		$image = $_POST['image'];
		$nbcom = 0;



		$stmt = $dbh->prepare("INSERT INTO articles (titre, contenu, auteurs, image, date_creation, nbCom) VALUES (:titre, :article, :auteur, :image, NOW(), :nbCom)");
		$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
		$stmt->bindParam(':article', $article, PDO::PARAM_STR);
		$stmt->bindParam(':auteur', $_SESSION['pseudo'], PDO::PARAM_STR);
		$stmt->bindParam('image', $image, PDO::PARAM_STR);
		$stmt->bindParam('nbCom', $nbcom, PDO::PARAM_INT);
		$stmt->execute();
				go('index.php');

					}else{
					go('index.php?admin=false');
					}
				}else{
					go('index.php?new=false');
				}
			}else{
				go('index.php?new=false');
			}

	}else{
		go('index.php?erros=true');
	}
 ?>
