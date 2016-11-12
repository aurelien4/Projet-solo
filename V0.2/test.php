<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
function affichageAsside(){
	console.log("l'addEvent marche");
	var body = document.getElementById('body')
	var liste = document.createElement("div");
	liste.id = "searchListe"
	liste.style.width = '40%';
	liste.style.height = '200px';
	liste.innerText ="ca marche";
	liste.style.transition = "width 3s";
	liste.style.backgroundColor = 'grey';
	body.appendChild(liste);
} 
	</script>
</head>
<body onload="affichageAsside()" id="body">

</body>
</html>