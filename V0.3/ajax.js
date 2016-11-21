function accueil(){
	var accueil = document.getElementById('article');
	accueil.innerHTML = "<h1>Bienvenu sur Actu Manga!</h1>";
}
function getButton(){
	var elem = document.getElementById('button');
	elem.addEventListener('click', callAjax, false);
	console.log(elem);
}
function callAjax(){
	var request = new XMLHttpRequest();
	request.onerror = function(event){
		console.log('Erreur'. event);
	}
	request.onload = function(){
		var return_data = this.responseText;
		document.getElementById('article').innerHTML = return_data;
	}
	request.open('GET', 'ArticleSQL.php', true);
	request.send();
}
function Newinscri(){
	if(elems = document.getElementById('inscription') == null){

	}else{
	var elems = document.getElementById('inscription');
	elems.addEventListener('click', callAjaxs);
	}
}
function callAjaxs(){
	var request = new XMLHttpRequest();
	request.onerror = function(event){
		console.log('Erreur'. event);
	}
	request.onload = function(){
		var return_data = this.responseText;
		document.getElementById('article').innerHTML = return_data;
	}
	request.open('GET', 'inscription.php', true);
	request.send();
}
function getNewArticle(){
	if(elemen = document.getElementById('newArticle') == null){

	}else{
	var elemen = document.getElementById('newArticle');
	elemen.addEventListener('click', callAjax1, false);
	}
}
function callAjax1(){
	var request = new XMLHttpRequest();
	request.onerror = function(event){
		console.log('Erreur'. event);
	}
	request.onload = function(){
		var return_data = this.responseText;
		document.getElementById('article').innerHTML = return_data;
	}
	request.open('GET', 'newArticle.php', true);
	request.send();
}
function articleAct(){
	if(elemnt = document.getElementById('articleActif') == null){

	}else{
		var elemnt = document.getElementById('articleActif');
		elemnt.addEventListener('click', Ajaxs);
	}
}
function Ajaxs(){
	var request =  new XMLHttpRequest();
	request.onerror = function(event){
		console.log(event);
	}
	request.onload = function(){
		var return_data = this.responseText;
		document.getElementById('article').innerHTML = return_data;
	}
	request.open('GET', 'articleActif.php', true);
	request.send();
}
function formco(){
	var stop = document.getElementById('bloqueForm');
	stop.preventDefault();
	stop.addEventListener('click', login, true);
}
function login(){
	var request = new XMLHttpRequest();
	var form = document.getElementsByTagName('input');
	var pack = "log="+form[0].value+"&pass="+form[1].value;
	console.log(pack);
	request.onerror = function(event){
		console.log(event);
	}
	request.onload = function(){
		var return_data = this.responseText;
		document.getelementById('').innerHTML = return_data;
	}
	request.open('POST', 'loginSQL.php', true);
	request.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
	request.send();
}
getButton();
Newinscri();
getNewArticle();
articleAct();