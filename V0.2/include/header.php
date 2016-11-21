	<nav class="navbar navbar-default" id="head" >
  <div class="container-fluid">
  <div class="row" >
  	<div class="col-sm-offset-3 col-sm-4">
    <h1>Blog Php</h1>
    <p id="erreur "></p><p id="news"></p>
  	</div>	<!-- col-sm-offset-3 -->
  	<div class="col-sm-5">

      <?php if(isset($_SESSION['mail'])){ ?>

        
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          		<!-- affichage du mail de l'utilisateur en cas de session active -->
          <?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];
				}else{  } ?>
				<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="profil.php">Gérer mon profil</a></li>
          <?php 
           if(isset($_SESSION['mail'])){if(isset($donnee['ID_user']) AND $_SESSION['ID'] == $donnee['ID_user']){ ?>
            <li><a href="listeDesMembre.php">Membres</a></li>
          <?php }} ?>
          	<li><a href="destroy.php">Déconnexion</a></li>
          </ul><!-- dropDown -->
        </li>
      </ul><!-- navbar -->
		</div>

  	<?php }else{ ?>
    <!-- Large modal -->
    <ul class="nav navbar-nav navbar-right">
<button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg">Connexion</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="row"><div class="col-md-offset-2">
            <form class="form-bloxk formcss" action="loginSQL.php" method="POST">
                 <legend>Connexion</legend>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Login" name="login" >
              </div>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Mot de passe" name="pass">
              </div>
              <button class="btn btn-default center-block" type="submit">Connection</button>
            <div class="row">
              <div class="col-md-offset-5 col-md-2">
              <a href="Inscription.php" class="btn btn-default center-block">Inscription</a>
              </div>
            </div>
            </form>
            </div></div>
    </div>
  </div>
</div>
</ul>
  			
  	<?php } ?>

  </div> <!-- row -->
    </div><!-- /.navbar-collapse -->
</nav>
      <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." id="searchBar">
          
              </div>
<div id="header"></div>
<!-- Split button -->
