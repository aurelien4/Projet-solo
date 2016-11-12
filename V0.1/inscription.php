<?php 
session_start(); 
/*	$_SESSION['login'] = $_POST['login'];
	$_SESSION['pseudo'] = $_POST['pseudo'];
	$_SESSION['password'] = md5($_POST['pass']);*/
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=loginpassword;charsetutf=8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur: ' . $e->getMessage);
	}
	if(isset($_POST['login'])&& isset($_POST['pass'])){
	$loginass = $dbh->prepare('INSERT INTO log (login, pseudo, password, date_inscription) VALUES (:log, :pseudo, :pass, NOW())');
	$loginass->execute(array(
		'log' => $_POST['login'],
		'pseudo' => $_POST['pseudo'],
		'pass' => md5($_POST['pass'])
		));
	echo $_POST['login'] . " " . $_POST['pseudo'] . " " . $_POST['pass'];
	header('location: index.php');
}else{
	echo 'erreur';
}
 ?>
