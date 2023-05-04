function envoyer() {
    //creation du request
    objetXHR = new XMLHttpRequest();
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var mail = document.getElementById("mail").value;
    var nomConn = document.getElementById("nomConn").value;
    var mdp = document.getElementById("mdp").value;
    var parametres = "nom="+ nom +"&prenom=" +prenom +"&mail="+mail+ "&nomConn="+nomConn +"&mdp="+mdp;
    objetXHR.open("post","inscription.php?"+parametres, true);
    objetXHR.onreadystatechange = actualiserPage;
    objetXHR.send(null);
}
function actualiserPage() {
    if (objetXHR.readyState == 4) {
    if (objetXHR.status == 200) {
     console.log(this.response);
    }
    else{
    // Message d’erreur
    alert("une erreur est survenue danc l'actualisation...");
    // Annule la requête en cours
    objetXHR.abort();
    objetXHR=null;
    }
    }
}