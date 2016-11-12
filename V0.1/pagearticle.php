<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<?php 
	include_once('includeIndex/header.php');

	try{
		$dbh = new PDO('mysql:host=localhost;dbname=articles; charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur : ' . $e->getMessage());
	}
	try{
		$dbb = new PDO('mysql:host=localhost;dbname=loginpassword; charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('erreur: ' . $e->getMessage());
	}
	$recup = $dbb->query('SELECT * FROM log');
	$donees = $recup->fetch();


	if(isset($_GET['billet'])){
	$recup_com = $dbh->prepare('SELECT tittre, contenu, auteurs, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE ID = ?');
	$recup_com->execute(array($_GET['billet']));
	$donnees = $recup_com->fetch();
 ?>
 <div id="button"><a href="index.php" id="button">Accueil</a></div>
 <div class="container">
		    <h3>
		        <?php echo htmlspecialchars($donnees['tittre']); ?>
		        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
		        </br> <strong>Ecris par <?php echo $donnees['auteurs'] ?></strong>
		    </h3>
		    
		    <p>
		    <?php
		    // On affiche le contenu du billet
		    echo nl2br(htmlspecialchars($donnees['contenu']));
		    ?>
			
		    </p>
		</div>
<?php 
	$ID = $_GET['billet'];
	
	$recup_com->closeCursor();
	$recup = $dbh->prepare('SELECT *
							FROM commentaires
							INNER JOIN billets ON commentaires.ID_proprietaire = billets.ID
							WHERE commentaires.ID_proprietaire = ?');
	$recup->execute(array($_GET['billet']));
	while($donneee = $recup->fetch()){
?>
	<p style="text-align: center"><strong><?php echo htmlspecialchars($donneee['auteur']); ?></strong> le <?php echo $donneee['date_commentaire']; ?></p>
	<p style="text-align: center"><?php echo nl2br(htmlspecialchars($donneee['commentaire'])); ?></p>
	<?php
		    $jointure = $dbb->query('SELECT ID_proprietaire	FROM super_admin');
			$donnee = $jointure->fetch();
	 if(isset($_SESSION['ID']) && isset($donnee['ID_proprietaire'])){
 			if($_SESSION['ID'] == $donnee['ID_proprietaire']){ ?>
	<p><a href="suprcom.php?auteur=<?php echo $donneee['auteur']; ?>">supprimer</a></p>
	<p><a href="EditeCom.php?auteur=<?php echo $donneee['auteur'] ?>">Editer</a></p>
<?php
}
}}
	$recup->closeCursor();
	}
 ?> <?php if(isset($_SESSION['login']) == isset($donees['login']) ){ ?>
		   	
		   
 <form action="commentairesql.php?billet=<?php echo $_GET['billet'] ?>"  method="POST" style="width:60%; margin-left: 20%">

 	<fieldset>
	<legend>Commentaires</legend>
 	<input type="text" name="auteur" placeholder="auteur" <?php if(isset($_SESSION['login'])){ echo 'value="'. $_SESSION['login'] . '"'; }?>>
 	<input type="text" name="commentaire">
 	<button>Valider</button>
 	</fieldset>
 </form>
 <?php  }else{echo "<p> inscrit toi si tu souhaite commenter et participer au discution";} ?>
</body>
</html>