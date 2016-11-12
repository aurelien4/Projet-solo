/*
 	<fieldset>
	<legend>Commentaires</legend>
 	<input type="text" name="auteur" placeholder="auteur">
 	<input type="text" name="commentaire">
 	<button>Valider</button>
 	</fieldset>*/
var form = document.getElementById('formulaire');
function formulaire(){
	div = document.createElement('div');
	input1 = document.createElement('input');
	input1.placeholder = "auteur";
	input1.name ='auteur';
	input2 = document.createElement('input');
	button = document.createElement('button');
	form.appendChild(div);
	div.appendChild(input1);
	div.appendChild(input2);
	div.appendChild(button);
}


