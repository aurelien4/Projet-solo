<?php
	include_once('connexion_base.php');
?>
	<div class="row firstrow">	
<?php
	$top4 = $dbh->query('SELECT * FROM articles  ORDER BY date_creation LIMIT 0,4');
	while($data_top = $top4->fetch()){?>
		<div class="col-sm-1" id='news'></div>
		<div class=" col-sm-2"><a href="pageArticle.php"><img src="<?php echo $data_top['image']; ?>"></a></div>
<?php } ?>
	</div>

<?php
	$top4->closeCursor();
	//liste exhaustive des articles
	$article = $dbh->query('SELECT * FROM articles');
	while($data = $article->fetch()){ ?>
		<div class="row">
		<div class="container divcontain">
			<div class="col-sm-offset-2 col-sm-7 ">
				<div class="panel panel-default">
				  <div class="panel-heading"><p id="Editer"></p><h2 class="title"><?php echo $data['titre'];?></h2></div>
				  <div class="panel-body">
				   <div class="row">
				   <div class="col-sm-offset-1 col-sm-3"><a href="pageArticle.php?billet=<?php echo $data['ID'] ?> " class="btn btn-default">Commenter</a>
				  </div>
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