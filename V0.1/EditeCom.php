<?php session_start(); ?>
 <form action="updateCom.php?com=<?php echo $_GET['auteur'] ?>"  method="POST" style="width:60%; margin-left: 20%">

 	<fieldset>
	<legend>Commentaires</legend>
 	<input type="text" name="auteur" placeholder="auteur">
 	<input type="text" name="commentaire">
 	<button>Valider</button>
 	</fieldset>
 </form>