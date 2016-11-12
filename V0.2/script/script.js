//function qui me permet de récuperer mes GET sous form de string
function get(nom){
   if(nom=(new RegExp('[?&]'+encodeURIComponent(nom)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(nom[1]);
}
var div = document.getElementById('erreur');
function errors(){
		div.innerText = "Une erreur est survenu.";
		div.style.color = "red";
}
function wins(){
		div.innerText = 'Merci de votre inscription.';
		div.style.color = 'green';
}
function deja(){
		div.innerText = 'Email ou Pseudo déjà utilisé';
		div.style.color = 'blue';
}
function admins(){
	if(get('admin') == 'true'){
		div.innerText = 'Article supprimé!'
		div.style.color = 'red';
	}else{
		div.innerText = 'Erreur d\'autorisation';
		div.style.color = 'red';
	}
}
function updateCom(){
	div.innerText = 'Commentaire édité';
	div.style.color = 'green';
}
function suppresion(){
	div.innerText = 'Commentaire supprimé';
	div.style.color = 'red';
}function nouveauCom(){
	div.innerText = 'Commentaire ajouté';
	div.style.color = 'green';
}
//recupération de GET
var error = get('errors');
var win = get('win');
var already = get('already')
var admin = get('admin');
var update= get('update');
var vide= get('vide');
var article = get('new')
var supprimer = get('supr');
var comment = get('com');
//script Inscription.php
function listener(){
	//eventListener sur les password pour avoir un visuel.
var input = document.getElementById('password');
	input.addEventListener('keyup', passwordinvalide);
	bouton.disabled = true;
	if(error == 'true'){	
		errors();
	}
	if(win == 'true'){
		wins();
	}
	if(already == 'true'){
		deja();
	}
}
	var bouton = document.getElementById('but');

	function passwordinvalide(){
		pass = document.getElementsByClassName('pass');
		label = document.getElementById('lab');
		if(pass[0].value != pass[1].value){
			label.innerText = "pass non valide";
			label.style.color = 'red';
		}else{
			label.innerText = "pass valide";
			label.style.color = "green";
		 	bouton.disabled = false;
		}

}
//fin du script Inscription.php

//script index.php
function index(){
	if(error == 'true'){
		errors();
	}else if(admin == 'true'){
		admins();
	}else if(admin == 'false'){
		admins();
	}else if(update == 'true'){
		updateCom();
	}else if(supprimer == 'true'){
		suppresion();
	}else if(comment == 'true'){
		nouveauCom();
	}else{
		edition();
	}
}
function edition(){
	var editer = document.getElementById('Editer');
	if(update == '1'){
		editer.innerText = 'Article édité.';
		editer.style.color = 'green';
	}else if(update == '2'){
		editer.innerText = 'Titre et contenu édité.';
		editer.style.color = 'green';
	}else if(update == '3'){
		editer.innerText = 'Titre et auteur édité.';
		editer.style.color = 'green';
		
	}else if(update == '4'){
		editer.innerText = 'Titre édité.';
		editer.style.color = 'green';
		
	}else if(update == '5'){
		editer.innerText = 'Contenu et auteur édité.';
		editer.style.color = 'green';
		
	}else if(update == '6'){
		editer.innerText = 'Contenu édité.';
		editer.style.color = 'green';
		
	}else if(update == '7'){
		editer.innerText = 'Auteur édité.';
		editer.style.color = 'green';
		
	}else if(update == '8'){
		editer.innerText = 'Auteur édité.';
		editer.style.color = 'green';
	}else if(update == '9'){
		editer.innerText = 'Auteur édité.';
		editer.style.color = 'green';
	}else if(update == '10'){
		editer.innerText = 'Auteur édité.';
		editer.style.color = 'green';
	}else if(update == '11'){
		editer.innerText = 'Auteur édité.';
		editer.style.color = 'green';
	}else if(update == '12'){
		editer.innerText = 'Article édité';
		editer.style.color = 'green';
	}else if(vide == 'true'){
		editer.innerText = 'Erreur d\'édition';
		editer.style.color = 'red';

	}else{
		newArticle();
	}
}
function newArticle(){
	var news = document.getElementById('news');
	if(article == 'true'){
		news.innerText = 'Article crée.';
		news.style.color = 'green';
	}else if(article == 'false'){
		news.innerText = 'Erreur lors de la création de l\'article.';
		news.style.color = 'red';
	}
}




