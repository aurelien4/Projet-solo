<?php
	include_once('connexion_base.php');
?>
	<div class="row firstrow">
		<div class="container" id="headerCom">
<?php
	$top4 = $dbh->query('SELECT * FROM articles  ORDER BY nbCom DESC LIMIT 0,4');
		?><h1 >Article les plus commentés</h1><?php
		while($data_top = $top4->fetch()){?>

		<div class="col-md-offset-1 col-md-2"><a href="pageArticle.php?billet=<?php echo $data_top['ID'] ?>"><img src="asset/<?php echo $data_top['image']; ?>"></a></div>
<?php 
} ?>
		</div>
	</div>

<?php
	$top4->closeCursor();
	//liste exhaustive des articles
	$article = $dbh->query('SELECT ID, titre, contenu, auteurs, image, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM articles ORDER BY date_creation DESC');
	while($data = $article->fetch()){ ?>
		<div class="row">
		<div class="container divcontain">
			<div class="col-md-offset-2 col-md-7 ">
				<div class="panel panel-default">
				  <div class="panel-heading"><p id="Editer"></p><a href="pageArticle.php?billet=<?php echo $data['ID'] ?> "><h2 class="title"><?php echo $data['titre'];?></h2></a>
						   	<?php
						  	if(isset($_SESSION['ID']) && isset($donnee['ID_user'])){
				 		
				 				if($_SESSION['ID'] == $donnee['ID_user']){?>
						<div class="col-md-offset-1 col-md-3"></div>
							   	<?php include('include/button.php');
							   	 }}
						  	 ?>
					  <div id="date"><?php echo $data['date_creation_fr']; ?></div>			
					</div>
				</div>
			</div>
		</div>
		</div>
<?php } $article->closeCursor(); ?>
