<?php session_start(); ?>
<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur : ' . $e->getMessage());
	}
		if( isset($_POST['titre']) && isset($_POST['contenue']) && isset($_POST['auteur']) && isset($_POST['image']))
		$titre = $_POST['titre'];
		$article = $_POST['contenue'];
		$auteur = $_POST['auteur'];
		$image = $_POST['image'];


		$stmt = $dbh->prepare("INSERT INTO billets (tittre, contenu, auteurs, image, date_creation) VALUES (:titre, :article, :auteur, :image, NOW())");
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':article', $article);
		$stmt->bindParam(':auteur', $auteur);		
		$stmt->bindParam('image', $image);
		$stmt->execute();
		header('location: index.php');
 ?>