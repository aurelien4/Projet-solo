<?php 
		echo '<form action="newArticleSQL.php" method="POST" style="width: 60%; margin-left:20%">
 			<fieldset>
 		<label>Titre</label>
 		<input type="text" class="form-control" name="titre" placeholder="Titre de l\'article">
 		<label spellcheck="true">Contenue</label>
 		<textarea name="contenue" class="form-control" rows="10"  placeholder="Contenue..."></textarea>
 		<label>Fichier(Image)</label>
 		<input type="file" class="form-control" name="image" >
 		<button class="btn btn-default">Valider</button>
 		</fieldset>
		</form>';
 ?>