<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Affichage article</title>
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<?php if(isset($_GET['billet'])){
		include_once('include/connexion_base.php');
		include_once('include/header.php');

		$affichage = $dbh->prepare('SELECT * FROM  articles WHERE ID = ?');
		$affichage->execute(array($_GET['billet']));
		$data = $affichage->fetch();
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<h1><?php echo $data['titre']; ?></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<p><?php echo $data['contenu']; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<p><?php echo $data['auteurs']; ?><div class="text-right"><?php echo $data['date_creation']; ?></div></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $affichage->closeCursor();?>
		<hr />
		<?php
		$com = $dbh->prepare('SELECT * FROM commentaires
		 						INNER JOIN articles
		 						ON commentaires.ID_article = articles.ID
		 						WHERE commentaires.ID_article = ?');
			$com->execute(array($_GET['billet']));
			while($affiche_com = $com->fetch()){
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<?php echo "<span>" . $affiche_com['pseudo'] . "</span>: ";
								  echo $affiche_com['commentaire'];
								if(isset($_SESSION['mail'])){
									$req = $dbh->prepare('SELECT * FROM commentaires WHERE ID_article = :ID AND pseudo = :aut');
									$req->execute(array(
										'ID'=>$_GET['billet'],
										'aut'=> $_SESSION['pseudo']
										));
									$info = $req->fetch();
									?>
									<?php
									$admin = $dbh->prepare('SELECT * FROM super_users WHERE ID_user = ?');
									$admin->execute(array($_SESSION['ID']));
									$dataID = $admin->fetch();
									if($_SESSION['ID'] == $dataID['ID_user']){?>
									<a href='EditeCom.php?ID_com=<?php echo $info['ID'];?>' class='btn btn-default'>Editer</a>
									<a href="suprComSQL.php?ID_com=<?php echo $info['ID']; ?>" class="btn btn-default">delete</a>
							<?php
									}
								}

							?>
						</div>
					</div>
				</div>

	<?php } if(isset($info['pseudo'])){if($_SESSION['pseudo'] == $info['pseudo']){
			if($_SESSION['ID'] != $dataID['ID_user']){
			?>
			<div class="col-md-2">

			<a href='EditeCom.php?ID_com=<?php echo $info['ID'];?>' class='btn btn-default'>Editer</a>

			</div>
		</div>
		</div>

			<?php	}}}
		if(isset($_SESSION['mail'])){
			$ID = $_GET['billet'];
			?>
			<div class="row"><div class="col-md-offset-3 col-md-6">
			<form action="comSQL.php?ID=<?php echo $ID; ?>" method="POST">
				<label spellcheck="true">Commenter</label>
				<textarea class="form-control" rows="4" name="commentaire" ></textarea>
				<button class="btn btn-default">Valider</button>
			</form>
			</div>
			</div>
		<?php }
	 $com->closeCursor();
	}else{
		echo "<h1>Erreur d'affichage, recharger la page.</h1>";
		} ?>
</body>
</html>
