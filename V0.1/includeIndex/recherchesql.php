<?php session_start();
	try{
		$dba = new PDO('mysql:host=localhost;dbname=articles;charset=utf8', 'root', 'M+D=cdna4');
	}catch(Execption $e){
		die('Erreur,' . $e->getMessage());
	}
if(isset($_POST['recherche'])){

		$recherche = $dba->prepare('SELECT * FROM billets WHERE tittre = ?');
		$recherche->execute(array($_POST["recherche"]));
		$donnees = $recherche->fetch();
		$recherche2 = $dba->prepare('SELECT * FROM billets WHERE auteur = ?');
		$recherche2->execute(array($_POST['recherche']));
		$donnees2 = $recherche2->fetch();
		$recherche3 = $dba->prepare('SELECT * FROM billets WHERE date_creation = ?');
		$recherche3->execute(array($_POST['recherche']));
		$donnees3 = $recherche3->fetch();
}else{
	header('location: index.php');
}

 ?>