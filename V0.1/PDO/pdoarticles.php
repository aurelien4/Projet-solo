<?php 
		try{
			$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
		}catch(Exception $e){
			die('erreur : ' . $e->getMessage());
		}
		
	 ?>