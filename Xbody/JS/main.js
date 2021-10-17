var email1 = document.getElementById("email1"),
	email = document.getElementById("email"),
	mot = document.getElementById("mot"),
	password = document.getElementById("password"),
	tele = document.getElementById("tele"),
	sexe = document.getElementById("sexe"),
	nom1 = document.getElementById("nom1"),
	nom = document.getElementById("nom"),
	prenom = document.getElementById("prenom"),
	date = document.getElementById("date"),
	a = '',
	b = '';
	
function Form() {
	a = nom1.value;
	b = email1.value;
}

function Form1() {
	nom.value = a;
	email.value = b;
}

const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
function validerForm() {
	if(email.value === '' || mot.value === '' || password.value === '' || sexe.value === '' || nom.value === '' || prenom.value === ''
	  || date.value === '') {
		alert('tu as oublié de remplie un champe !! .');
		return ;
		}
	else {
		if(!re.test(email.value.trim())) {
			alert('email est non correct !! .');
			return;
		}
		if(tele.value != '' ) {
			if(isNaN(tele.value) === true || parseFloat(tele.value) != parseInt(tele.value) || tele.value.length != 10) {
				alert('Telephone est non correct !! .');
				return;
			}
		}
		
		if(nom.value.length > 15 || nom.value.length < 3 ) {
			alert('le nom est incorrect !!');
			return;
		}
		if(prenom.value.length > 15 || prenom.value.length < 3 ) {
			alert('le prenom est incorrect !!');
			return;
		}
		
		if(mot.value.length < 6 || mot.value.length > 25 || mot.value != password.value ) {
			alert('le mot de passe incorrect !!');
			return;
		}
			}
	alert('Félicitations vous avez inscrit avec succès .');
}