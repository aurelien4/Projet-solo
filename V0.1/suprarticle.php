<?php session_start(); ?>
<?php 
		try{
			$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur : ' . $e->getMessage());
		}
		if(isset($_GET['billet'])){
		$supression = $dbh->prepare('DELETE FROM billets WHERE ID = ?');
		$supression->execute(array($_GET['billet']));
		echo $_GET['billet'];
		header('location: index.php');
		}else{
			echo 'erreur';
		}
 ?>