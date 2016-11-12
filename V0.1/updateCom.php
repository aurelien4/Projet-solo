<?php session_start(); ?>
<?php 
	try{
			$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur : ' . $e->getMessage());
		}
		if(isset($_POST['auteur']) && isset($_POST['commentaire'])){
	$auteur = $_POST['auteur'];
	$commentaire = $_POST['commentaire'];

	if($auteur != null&& $commentaire != null){
		$update = $dbh->prepare('UPDATE commentaires SET auteur = :auteur, commentaire = :commentaire WHERE auteur = :auteurs ');
		$update->execute(array(
			'auteur' => $auteur,
			'commentaire' => $commentaire,
			'auteurs' => $_GET['com']
			));
	}elseif($auteur != null){
		$update = $dbh->prepare('UPDATE commentaires SET auteur = :auteur, WHERE auteur = :auteurs ');
		$update->execute(array(
			'auteur' => $auteur,
			'auteurs' => $_GET['com']
			));
	}elseif($commentaire != null){
		$update = $dbh->prepare('UPDATE commentaires SET commentaire = :commentaire WHERE auteur = :auteurs ');
		$update->execute(array(
			'commentaire' => $commentaire,
			'auteurs' => $_GET['com']
			));
	}
	header('location: index.php');
 	}
 ?>