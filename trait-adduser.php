<?php
session_start();
//fonction pour se connecter a a la de données
    function getConnexion(){
        $host="localhost";
        $user="root";
        $password="";
        $dbname="ecole";

        $connexion= mysqli_connect($host,$user,$password,$dbname);

        return $connexion;

    }
//fonction pour executer des requete sql comme insert update delete ect... a la base de données
    function executeSQL($sql){    //C'est cette connexion qui est utilisée pour exécuter des requêtes SQL.
        $execution=mysqli_query(getConnexion(), $sql);      //La requête SQL à exécuter, qui est la variable $sql.
        return $execution;                              
    }
//fonction pour ajouter des données au niveau de la base de données
    function addServeur ($prenom, $nom, $email, $cni, $formation_id){
        $sql= "INSERT INTO user VALUES(NULL, '$prenom','$nom','$email','$cni','$formation_id')";
        //$sql2= "INSERT INTO champ (nom, email, mdp) VALUES('$nom','$email', '$mdp')";
        //$sql3= "INSERT INTO champ SET nom = '$nom', email = '$email', mdp = '$mdp'";
        return executeSQL($sql);                        //La requête est passée à la fonction executeSQL($sql), qui va l'exécuter en utilisant la connexion MySQL.
        //executeSQL($sql2);                        //La requête est passée à la fonction executeSQL($sql), qui va l'exécuter en utilisant la connexion MySQL.
        //executeSQL($sql3);                        //La requête est passée à la fonction executeSQL($sql), qui va l'exécuter en utilisant la connexion MySQL.
    }
//si le formulaire est envoyer avec la méthode POST avec identifiant (name=ajout ) alors on récupére les champs et le mettre dans une variable ensuite appellée la fonction pour y la valeur ajouter les variable
    if(isset($_POST['submit'])){
        $prenomI = $_POST['prenom'];
        $nomI = $_POST['utilisateur'];
        $emailI =$_POST['email'];
        $cniI = $_POST['cni'];
        $formation_idI =$_POST['formation_id'];
        
        addServeur($prenomI, $nomI, $emailI, $cniI, $formation_idI);
        $_SESSION['message-add']=" L'utilisateur a été ajouter avec succés"; 
    }
    header("location:ecole.php");
      //aprés avoir terminer tout sa sa doit nous amener a la page inscription.php
    
?>