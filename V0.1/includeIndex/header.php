<header id="header">
		<div class="container">
	<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-4 ">	
		<a id="Titre" href="index.php">Blog Manga</a>
	</div>
			<?php if(isset($_SESSION['login'])){ ?>
	<div class="col-xs-12 col-sm-6 col-md-offset-7 col-md-1">	 
		 <li class="dropdown">
      		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compte  <span class="caret"></span></a>
      			<ul class="dropdown-menu">
      				<li><?php echo $_SESSION['login'] ?></li>
        			<li><a href="profil">Gérer son profil</a></li>
        			<li><a href="destroy.php">deco</a></li>

      			</ul>
        </li>
        </div>
			<?php }else{ ?>
		<div class="col-xs-12 col-sm-6 col-md-offset-6 col-md-1">	 <li class="dropdown">
      		<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">connecter-vous <span class="caret"></span></a>	
      			<ul class="dropdown-menu">
        			<li><a href="profil.php">Gérer son profil</a></li>
        			<li><a href="destroy.php">deco</a></li>

      			</ul>
      			<form class="form-inline" action="login.php" method="POST">
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Login" name="login" "></input>
			</div>
			<div class="form-group">
				<input class="form-control" type="password" placeholder="Mot de passe" name="pass"></input>
			</div>
			<button class="btn btn-default" type="submit">Connexion</button>
			<a href="sign.php" class="btn btn-default">Inscription</a>
			</form>
			<?php } ?>
		
		</div>
		</div>
	</header>