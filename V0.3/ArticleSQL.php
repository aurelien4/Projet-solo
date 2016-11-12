<?php 
	include "include/connexion_base.php";

	
	$articles = $dbh->query('SELECT * FROM articles ORDER BY date_creation DESC');
	while($data = $articles->fetch()){
		echo 
		'<div class="row">
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
		<hr /> 	 ';
	}
 ?>