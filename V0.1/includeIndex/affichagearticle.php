	<?php $requete = $dbh->query('SELECT ID, tittre, contenu, auteurs, image, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY ID LIMIT 0,4');
		while($donnee = $requete->fetch()){
			 
			 ?>

		<div class="col-md-2" ><a href="pagearticle.php?billet=<?php echo $donnee['ID'] ?>"><img src="<?php echo $donnee['image']?>" alt="pageManga"></a></div>
	<!-- <div class="col-md-2"><img src="image/img2.jpg" alt="pageManga" "></div>
		<div class="col-md-2"><img src="image/img3.jpg" alt="pageManga" "></div>
		<div class="col-md-2"><img src="image/img4.png" alt="pageManga" "></div>
	</div> -->
		<?php } ?>
		</div>
	<div class="row">
		<div class="col-md-offset-1col-md-10 container">
			<?php

			$requete->closeCursor();

	 // On récupère les 5 derniers billets
		$req = $dbh->query('SELECT ID, tittre, contenu, auteurs, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY ID');

		while ($donnees = $req->fetch())
		{
		?>
		
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
		    <br />
		    
		    <em><a href="pagearticle.php?billet=<?php echo $donnees['ID'] ?>">Commentaires</a></em>
		    <?php 
		    // 'TODO' adapter la vérif au nouveau format d'admin
		    if(isset($_SESSION['ID'])){
		    $jointure = $dbb->prepare('SELECT ID_proprietaire FROM super_admin WHERE ID_proprietaire = ?');
		    $jointure->execute(array($_SESSION['ID']));
			$donnee = $jointure->fetch();
		}
		    if(isset($_SESSION['ID']) && isset($donnee['ID_proprietaire'])){
 				if($_SESSION['ID'] == $donnee['ID_proprietaire']){  
		   	 include('button.php');
		   	 }} ?>
		    </p>

	
		<?php
		} // Fin de la boucle des billets
		$req->closeCursor();
		?>
	<!--  $recup->closeCursor(); -->
		</div>
	</div>