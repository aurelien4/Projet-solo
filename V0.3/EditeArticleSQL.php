<?php session_start(); 
include_once('include/fonctionUtile.php');
		if(isset($_POST['Titre']) OR isset($_POST['contenue']) OR isset($_POST['Auteur']) OR isset($_POST['image'])){
			include_once('include/connexion_base.php');
			
		$titre = $_POST['Titre'];
		$contenu = $_POST['contenue'];
		$auteur = $_POST['Auteur'];
		$image = $_POST['image'];

  		if($titre != null && $auteur != null && $contenu != null && $image != null){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, auteurs = :auteur, image = :image, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre' => $titre,
			'contenu' => $contenu,
			'image' => $image,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=12');
		}else if($titre != null && $contenu != null  && $auteur != null ){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'contenu'=>$contenu,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=1');
		}else if($titre != null  && $contenu != null && $image != null){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, auteurs = :auteur, image = :image, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre' => $titre,
			'contenu' => $contenu,
			'image' => $image,
			'id' =>$_GET['billet']));
			go('index.php?update=11');
		}else if($contenu != null && $auteur != null && $image != null){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, auteurs = :auteur, image = :image, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'contenu' => $contenu,
			'image' => $image,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=10');
		}else if($image != null && $titre != null  && $auteur != null ){
			$update = $dbh->prepare('UPDATE articles SET  titre = :titre, auteurs = :auteur, image = :image, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre' => $titre,
			'image' => $image,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=9');
		}else if($image != null && $contenu != null  && $titre != null ){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, image = :image, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre' => $titre,
			'contenu' => $contenu,
			'image' => $image,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=8');
		}elseif($titre != null && $contenu != null){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, contenu = :contenu, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'contenu'=>$contenu,
			'id' =>$_GET['billet']));
			go('index.php?update=2');
		}elseif($titre != null && $auteur != null ){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=3');
		}elseif($titre != null){
			$update = $dbh->prepare('UPDATE articles SET titre = :titre, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'titre'=>$titre,
			'id' =>$_GET['billet']));
			go('index.php?update=4');
		}elseif($contenu != null  && $auteur != null){
			$update = $dbh->prepare('UPDATE articles SET contenu = :contenu, auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'contenu'=>$contenu,
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=5');
		}elseif($contenu != null ){
			$update = $dbh->prepare('UPDATE articles SET contenu = :contenu, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'contenu'=>$contenu,
			'id' =>$_GET['billet']));
			go('index.php?update=6');
		}elseif($auteur != null){
			$update = $dbh->prepare('UPDATE articles SET auteurs = :auteur, date_creation = NOW() WHERE ID = :id ');
			$update->execute(array(
			'auteur' =>$auteur,
			'id' =>$_GET['billet']));
			go('index.php?update=7');
		}else{
			go('index.php?vide=true');
		}
 	}else{
 			go('index.php?errors=true');
 	}
 ?>