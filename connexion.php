<?php


    
    $nomConnErr = NULL;
    $mdpdErr = NULL;
    $nomConn = NULL;
    $mdp = NULL;
    $nomConnte = NULL;
    $mdpte = NULL;
  

      
    if( !isset($_REQUEST['nomConn']) || !isset($_REQUEST['mdp']))
    {
        echo ('erreur isset ');
       
        
    }
    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if (empty($_REQUEST["nomConn"])) {
            $nomConnErr = "le nom de connexion est obligatoire";
        } else {
            $nomConn = ($_REQUEST["nomConn"]);
        }
        if (empty($_REQUEST["mdp"])) {
            $mdpErr = "le mot de passe est obligatoire";
        } else {
            $mdp= ($_REQUEST["mdp"]);
        }
        echo"first test true";
        

          //connexion a la base de donnee
        
      try{
           $pdo=new PDO("mysql:host=localhost;dbname=formulaire","root","root");
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           echo"connexion reussi";

           $conPdo=$pdo->prepare("SELECT username FROM inscription WHERE namelogin= '$nomConn' AND mdp= '$mdp' ");
           $conPdo->execute();
           $data=$conPdo->fetchAll(PDO::FETCH_ASSOC);
           if($data == true)
           {
            var_dump( $data);
           }
         
                 
           
         }
         catch(PDOException $e){
             echo "Connection failed: " . $e->getMessage();
         }
   
    }