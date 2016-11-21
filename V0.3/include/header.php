<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="row header" >
      <div class="col-sm-offset-3 col-sm-4">
        <a href="index.php"><h1 id="titleSite">Actu Manga</h1></a>
          <p id="erreur"></p>
      </div>	<!-- col-sm-offset-3 -->
  <div class="col-sm-5">   

<?php if(isset($_SESSION['mail'])){ ?>

  <form class="navbar-form navbar-left" role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search">
    </div>
      <button type="submit" class="btn btn-default">Rechercher</button>
  </form>

  <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];}else{?></div><?php } ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
    	 <li><a href="profil.php">Gérer mon profil</a></li>
    	 <li><a href="destroy.php">Déconnexion</a></li>
      </ul><!-- dropDown -->
    </li>
  </ul><!-- navbar -->
</div> <!-- col-sm-9 -->


<?php }else{ ?>

<div class="col-sm-12">
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
        <button type="submit" class="btn btn-xs btn-default">Rechercher</button>
    </form>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
            <form class="form-inline" id="bloqueForm">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Login" name="login" "></input>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" placeholder="Mot de passe" name="pass"></input>
        </div>
        <button class="btn btn-default" type="submit">Connection</button>
        <a href="Inscription.php" class="btn btn-default">Inscription</a>
        </form>

  </ul>
</div>
 	
</div>
<!-- Single button -->

<?php } ?>

      </div> <!-- row -->
    </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
</nav>
	