<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Actu Manga</title>
	<?php include_once "include/connexion_base.php"; ?>
	<style type="text/css">
		body{
			margin:0;
		}
	</style>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<?php 
	$articlee = $dbh->query('SELECT * FROM articles');
	$datas = $articlee->fetch();
 ?>
<body>
	<div class="row">

		<div class="col-md-offset-2 col-md-8">

			<div class="container" style="background-color: grey; width:100%; min-height:98vh">
				
				<div class="page-header">
					<div class="row">
						<div class="col-md-4"><h1>Actu manga</h1></div>
						<div class="col-md-offset-4 col-md-4">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Go!</button>
								</span>
							</div>
						</div>

					</div>
								<div class="row">
									<div class="col-md-offset-9">

										<?php if(isset($_SESSION['mail'])){ ?>

										
										<ul class="nav navbar-nav ">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<!-- affichage du mail de l'utilisateur en cas de session active -->
													<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];
												}else{  } ?>
												<span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="profil.php">Gérer mon profil</a></li>
													<li><a href="destroy.php">Déconnexion</a></li>
												</ul><!-- dropDown -->
											</li>
										</ul><!-- navbar -->
										

										<?php }else{ ?>

										<ul class="nav navbar-nav ">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<div>Connection<span class="caret"></span></div>
												</a>
												<ul class="dropdown-menu">
													<form class="form-inline" action="loginSQL.php" method="POST">
														<div class="form-group">
															<input class="form-control" type="text" placeholder="Login" name="login" >
														</div>
														<div class="form-group">
															<input class="form-control" type="password" placeholder="Mot de passe" name="pass">
														</div>
														<button class="btn btn-default" type="submit">Connection</button>
														<a href="#0" id="inscription" class="btn btn-default">Inscription</a>
													</form>
												</ul><!-- dropDown -->
											</li><!-- dropdown -->
										</ul><!-- navbar -->
										<?php } ?>

									</div>
								</div>
				</div>
				<?php if(isset($_SESSION['mail'])){
					$verif = $dbh->prepare('SELECT ID_user FROM super_users WHERE ID_user = ?');
					$verif->execute(array($_SESSION['ID']));
					$info = $verif->fetch();
					if($_SESSION['ID'] == $info['ID_user']){
				 ?>
				<a href="#" id="newArticle" class="btn btn-default">Nouvelle article</a>
				<?php }} ?>
				<div class="row">
					<div class="col-md-2">
						<ul class="nav nav-pills nav-stacked" >
							<li role="presentation"><a href="#" class="btn btn-default" onclick="accueil()">Accueil</a></li>
							<li role="presentation"><a href="#" class="btn btn-default" id="button">Dernier article</a></li>
							<li role="presentation"><a href="#" class="btn btn-default" id="articleActif">Plus actif</a></li>
						</ul>
					</div>
					<div class="col-md-9">
						<div id="article">
							<h1>Bienvenu sur actu manga!</h1>
						</div>
					</div>
					<div class="col-md-1">
						<a href="#" class="btn"><img src="" alt="facebook"></a>
						<a href="#" class="btn"><img src="" alt="twiter"></a>
						<hr />
						<p>Partenaire:</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="ajax.js"></script>
</body>
</html>