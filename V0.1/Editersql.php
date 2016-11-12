<?php session_start(); ?>
<?php 
		try{
			$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur : ' . $e->getMessage());
		}
		if(isset($_POST['Titre']) && isset($_POST['contenue'])&& isset($_POST['Auteur'])){
		$titre = $_POST['Titre'];
		$contenu = $_POST['contenue'];
		$auteur = $_POST['Auteur'];

		if($titre != null && $contenu != null  && $auteur != null ){
			$update = $dbh->prepare('UPDATE billets SET tittre = :titre, contenu = :contenu, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'contenu'=>$contenu,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
		}elseif($titre != null && $contenu != null){
			$update = $dbh->prepare('UPDATE billets SET tittre = :titre, contenu = :contenu, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'contenu'=>$contenu,
			'id' =>$_GET['billet']));
		}elseif($titre != null && $auteur != null ){
			$update = $dbh->prepare('UPDATE billets SET tittre = :titre, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
		}elseif($titre != null){
			$update = $dbh->prepare('UPDATE billets SET tittre = :titre, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'id' =>$_GET['billet']));
		}elseif($contenu != null  && $auteur != null){
			$update = $dbh->prepare('UPDATE billets SET contenu = :contenu, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'contenu'=>$contenu,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
		}elseif($contenu != null ){
			$update = $dbh->prepare('UPDATE billets SET contenu = :contenu, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'contenu'=>$contenu,
			'id' =>$_GET['billet']));
		}elseif($auteur != null){
			$update = $dbh->prepare('UPDATE billets SET auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
		}
		header('location: index.php');
 		}else{
 			echo "error";
 		}
 ?>