<?php


    
    
    $nomErr = NULL;
    $prenomErr = NULL;
    $pseudoErr = NULL;
    $mailErr = NULL;
    $mdpErr = NULL;
    $nom = NULL;
    $prenom = NULL;
    $pseudo = NULL;
    $mail = NULL;
    $mdp= NULL;
   
      

      
    if(!isset($_REQUEST['nom']) || !isset($_REQUEST['prenom']) || !isset($_REQUEST['mail']) || !isset($_REQUEST['mdp']) || !isset($_REQUEST['nomConn']))
    {
        echo ('erreur isset nom');
       
        
    }
    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if (empty($_REQUEST["nom"])) {
            $nomErr = "le nom est obligatoire";
        } else {
            $nom = ($_REQUEST["nom"]);
        }
        if (empty($_REQUEST["prenom"])) {
            $prenomErr = "le prenom est obligatoire";
        } else {
            $prenom = ($_REQUEST["prenom"]);
        }
        if (empty($_REQUEST["nomConn"])) {
            $pseudoErr = "le nom de connexion est obligatoire";
        } else {
            $pseudo = ($_REQUEST["nomConn"]);
        }
        if (empty($_REQUEST["mail"])) {
            $mailErr = "l email est obligatoire";
        } else {
            $mail = ($_REQUEST["mail"]);
        }
        if (empty($_REQUEST["mdp"])) {
            $mdpErr = "le mot de passe est obligatoire";
        } else {
            $mdp = ($_REQUEST["mdp"]);
        }
        echo"first test true";

          //connexion a la base de donnee
        
      try{
            $pdo=new PDO("mysql:host=localhost;dbname=formulaire","root","root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"connexion reussi";

           $insPdo=$pdo->prepare("INSERT INTO inscription(username,firstname,namelogin,mail,mdp)
                                       VALUES(:username,:firstname,:namelogin,:mail,:mdp)");
           $insPdo->bindParam(':username',$nom);
           $insPdo->bindParam(':firstname',$prenom);
           $insPdo->bindParam(':namelogin',$pseudo);
           $insPdo->bindParam(':mail',$mail);
           $insPdo->bindParam(':mdp',$mdp);

           $insPdo->execute();
          
           
         }
         catch(PDOException $e){
             echo "Connection failed: " . $e->getMessage();
         }
   
    }