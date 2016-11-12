<?php session_start(); ?>
<?php 
	try{
		$stdd = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur : ' . $e->getMessage());
	}
	//recupération des POST et du GET
		if(isset($_POST['auteur'])&& isset($_POST['commentaire'])&& isset($_GET['billet'])){
		$auteur = $_POST['auteur'];
		$com = $_POST['commentaire'];
		$ID_article = $_GET['billet'];
		//requete SQL                                                                             
		$envoie = $stdd->prepare('INSERT INTO commentaires (ID_proprietaire, auteur, commentaire, date_commentaire) VALUES (:proprio, :auteur, :commentaire, NOW())');
		$envoie->execute(array(
		'auteur' => $auteur,
		'commentaire' => $com,
		'proprio' => $ID_article
		));

		header('location: index.php');
		}
		/*

		$stmt = $stdd->prepare("INSERT INTO commentaires (auteur, commentaire, date_commentaire) VALUES (:auteur, :com, :date_crea)");
		$stmt->bindParam(':auteur', $auteur);
		$stmt->bindParam(':com', $com);
		$stmt->bindParam(':date_crea', $date_crea);
		$stmt->execute();

		echo $auteur . " " . $com . " " . $date_crea;
		$stmt->closeCursor();*/

 ?>