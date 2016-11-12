function getSearchbar(){
	var searchBar = document.getElementById('testtest');
	searchBar.addEventListener('keyup', SendAjax, false);
}
function SendAjax(){
	var request = new XMLHttpRequest();
	var input = document.getElementById('testtest');
	var recherche = 'recherche='+input.value;
	request.onerror = function (event) {
            alert("Erreur : ", event);
        }
    request.onload = function(){
    	var return_data = this.responseText;
    	document.getElementById('searchDiv').innerHTML = return_data;
    }
    request.open('POST', 'search.php', true);
    request.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    request.send(recherche);
}
function getInput(){
	var barreDeRecherche = document.getElementById('testtest');
	console.log(barreDeRecherche);
	barreDeRecherche.addEventListener('mousedown', affichageAsside, false);
}
function affichageAsside(){
	console.log("l'addEvent marche");
	var header = document.getElementById('header');
	var liste = document.createElement("div");
	var button = document.createElement("button");
	button.id = "close";
	button.style.borderRadius = "100%";
	button.style.minHeight = "50px";
	button.style.minWidth = "50px";
	button.style.maxHeight = "50px";
	button.style.maxWidth = "50px";
	button.innerText = "X";
	button.style.fontSize = "30px";
	button.addEventListener('click', fermeture, false);
	liste.id = "searchListe";
	liste.style.position = "absolute";
	liste.style.right = "0";
	liste.style.width = '40%';
	liste.style.height = '100%';
	liste.style.zIndex = "3";
	liste.style.border = "1px solid black";
	liste.style.backgroundColor = "white";
	liste.style.transition= "";
	var div = document.createElement('div');
	div.id = "searchDiv";
	div.style.width = "100%";
	div.style.height="100%";
	liste.appendChild(div);
	liste.insertBefore(button, div);
	header.appendChild(liste);

}
function fermeture(){
	var header = document.getElementById('header');
	header.innerHTML = "";
}
getSearchbar();
getInput();