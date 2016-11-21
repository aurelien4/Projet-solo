<?php 
session_start();
include "include/fonctionUtile.php";
if(isset($_POST['commentaire'])){
	$com = $_POST['commentaire'];

		if(isset($_SESSION['mail'])){
			include "include/connexion_base.php";
			if($_POST['commentaire'] != null){
			$edite = $dbh->prepare('UPDATE commentaires SET commentaire = :com WHERE ID_commentaire = :ID_com');
			$edite->execute(array(
				'com' => $com,
				'ID_com' => $_GET['ID_co']
				));

			go('index.php?update=true');
		}else{
			go('index.php');
		}
		}else{
			go('index.php?admin=false');
		}

}else{
	go('index.php?errors=true');
}
 ?>

