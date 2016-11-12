<?php session_start(); ?>
<?php 
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=articles;charsetutf=8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur : ' . $e->getMessage());
	}
	if(isset($_GET['auteur'])){
	$deleteCom = $dbh->prepare('DELETE FROM commentaires WHERE auteur = ?');
	$deleteCom->execute(array($_GET['auteur']));
	echo $_GET['auteur'];
		header('location: index.php');
	}else{
		echo 'erreur';
	}
 ?>