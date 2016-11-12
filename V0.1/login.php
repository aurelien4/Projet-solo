<?php 
	session_start();
	$_SESSION['login'] = $_POST['login'];/*
	$_SESSION['pseudo'] = $_POST['pseudo'];*/
	$_SESSION['password'] = md5($_POST['pass']);
	echo $_SESSION['login'] .'</br>'. $_SESSION['password'] . '</br>' ;
	
try{	
	$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;charset=utf8', 'root', 'M+D=cdna4');
}catch(Exception $e){
		die('erreur, ' . $e->getMessage());
}

if(isset($_POST['login']) AND isset($_POST['pass'])){
		

		$recup = $dbh->prepare('SELECT * FROM log WHERE login = ?');
		$recup->execute(array($_SESSION['login']));
		$donnees = $recup->fetch();
	/*	echo $donnees['login'] . "</br>" . $donnees['password'] . "</br>" . $_SESSION['pseudo'] . "</br>" . $_SESSION['password'] ;*/


	if($_SESSION['login'] == $donnees['login'] && $_SESSION['password'] == $donnees['password']){
			$_SESSION['ID'] = $donnees['ID'];
			header('location: index.php');
	}else{
			header('location: errorpage.php');
	}
}else{
			header('location: errorpage.php');
}





	 ?>