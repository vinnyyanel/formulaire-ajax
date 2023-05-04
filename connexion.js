function envoyer() {
    //creation du request
    objetXHR = new XMLHttpRequest();
    var nomConn = document.getElementById("nomConn").value;
    var mdp = document.getElementById("mdp").value;
    var parametres = "nomConn="+nomConn +"&mdp="+mdp;
    objetXHR.open("post","connexion.php?"+parametres, true);
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