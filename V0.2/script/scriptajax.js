function getSearchbar(){
	var searchBar = document.getElementById('searchBar');
	searchBar.addEventListener('keyup', SendAjax, false);
}
function SendAjax(){
	var request = new XMLHttpRequest();
	var input = document.getElementById('searchBar');
	var recherche = 'recherche='+input.value;
	request.onerror = function (event) {
            alert("Erreur : ", event);
        }
    request.onload = function(){
    	var return_data = this.responseText;
    	document.getElementById('searchDiv').innerHTML = "<p>"+return_data+"</p>";
    }
    request.open('POST', 'search.php', true);
    request.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    request.send(recherche);
}
function getInput(){
	var barreDeRecherche = document.getElementById('searchBar');
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
	button.style.minHeight = "30px";
	button.style.minWidth = "30px";
	button.style.maxHeight = "30px";
	button.style.maxWidth = "30px";
	button.innerText = "X";
	button.style.fontSize = "20px";
	button.addEventListener('click', fermeture, false);
	liste.id = "searchListe";
	liste.style.position = "absolute";
	liste.style.left= "0";
	liste.style.borderRadius = "10%"
	liste.style.width = '40%';
	liste.style.height = '100%';
	liste.style.zIndex = "3";
	liste.style.border = "1px solid white";
	liste.style.backgroundColor = "black";
	var div = document.createElement('div');
	div.id = "searchDiv";
	div.style.width = "100%";
	div.style.height="30%";
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