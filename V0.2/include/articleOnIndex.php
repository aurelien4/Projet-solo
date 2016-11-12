<?php
	include_once('connexion_base.php');
?>
	<div class="row firstrow">
	<div class="container">
<?php
	$top4 = $dbh->query('SELECT * FROM articles  ORDER BY date_creation LIMIT 0,4');
	while($data_top = $top4->fetch()){?>

		<div class="col-md-offset-1 col-md-2"><a href="pageArticle.php?billet=<?php echo $data_top['ID'] ?>"><img src="<?php echo $data_top['image']; ?>"></a></div>
<?php } ?>
</div>
	</div>

<?php
	$top4->closeCursor();
	//liste exhaustive des articles
	$article = $dbh->query('SELECT * FROM articles');
	while($data = $article->fetch()){ ?>
		<div class="row">
		<div class="container divcontain">
			<div class="col-md-offset-2 col-md-7 ">
				<div class="panel panel-default">
				  <div class="panel-heading"><p id="Editer"></p><a href="pageArticle.php?billet=<?php echo $data['ID'] ?> "><h2 class="title"><?php echo $data['titre'];?></h2></a>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ButtonEditSupr" aria-expanded="false" aria-controls="ButtonEditSupr">
					  <span class="caret"></span>
					</button>
					<div class="collapse" id="ButtonEditSupr">
					 
		     			<div class="col-md-offset-1 col-md-3"></div>
						   	<?php
						  	if(isset($_SESSION['ID']) && isset($donnee['ID_user'])){
				 				if($_SESSION['ID'] == $donnee['ID_user']){
							   	 include('include/button.php');
							   	 }}
						  	 ?>
					  
					</div>
					</div>
				</div>
			</div>
		</div>

<?php } $article->closeCursor(); ?>
