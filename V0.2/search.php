<?php session_start();
  if(isset($_POST['recherche'])){
    
    $request = $_POST['recherche'];
    include "include/connexion_base.php";
    $recherche = $dbh->prepare("SELECT ID, titre FROM articles WHERE MATCH(titre,contenu) AGAINST (:test)");
    $recherche->execute(array(
    	'test' => $request
    	));
	while($data = $recherche->fetch()){

    		echo '<a href"pageArticle.php?billet='.$data['ID'].'>'.$data['titre'].'</a>';
    	
    		}

}

 ?>
