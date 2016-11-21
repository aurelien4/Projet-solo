<?php 
	if(isset($_POST['json'])){
		$json = json_decode($_POST['json']);
		var_dump($json);
	}else{
		header('location: index.php');
	}

 ?>