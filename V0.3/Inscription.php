<?php 



	echo '<form class="form-block" id="form" action="inscriptionSQL.php" method="POST">
	<fieldset>
	<legend>Inscription <p id="erreur"></p></legend>
	<div class="form-group">
			<input class="form-control" type="text" placeholder="Login" name="login"></input>
		</div>
	<div class="form-group">
			<input class="form-control" type="text" placeholder="Pseudo" name="pseudo"></input>
		</div>
		<div class="form-group">
			<input class="form-control pass" type="password" placeholder="Mot de passe" name="password"></input>
		</div>
	<div class="form-group">
			<input class="form-control pass" type="password" id="password" placeholder="Mot de passe" name="password2"></input>
			<span id="lab"></span>
		</div>

		<button class="btn btn-default" id="but">Inscription</button>
	</fieldset>
	</form>';


 ?>
