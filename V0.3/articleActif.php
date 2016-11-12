<?php 
	include "include/connexion_base.php";

	$article_a = $dbh->query('SELECT * FROM articles LEFT JOIN commentaires ON articles.ID = commentaires.ID_article WHERE articles.nbCom >= 5 ');
	$data = $article_a->fetch();

	echo '<div class="row">
			<div class="col-md-offset-3 col-md-8">
				<h1>'.$data["titre"].'</h1>
			</div>
		</div>
		<div class="row>
			<div class="col-md-offset-2 col-md-9">'
				.$data["contenu"].
			'</div>
		</div>
		<div class="row" style="text-align:right">'.$data['auteurs'].'</div>
		<hr /> 	';
 ?>