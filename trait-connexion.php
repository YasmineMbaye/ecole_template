<?php
session_start(); //avant de crée des session en dessous il faut l'initialiser dabord
//fonction pour se connecter a a la de données
function getconnexion(){
    $host= "localhost";
    $user="root";
    $password= "";
    $dbname= "ecole";

    $connexion= mysqli_connect($host, $user, $password, $dbname);
 
    return $connexion;

}
//fonction pour executer des requete sql comme insert update delete ect... a la base de données
function executeSQL($sql){
    $execution=mysqli_query(getconnexion(), $sql);
    return $execution;
}
//fonction pour selection recuperer des donnees a la base de données
function recuperation($email,$mdp){
    $sql="Select nom, email, mdp FROM champ WHERE email='$email' AND mdp='$mdp'" ;

    return executeSQL($sql);    //La requête SQL est ensuite passée à la fonction executeSQL(), qui va l'exécuter dans la base de données.

}
//récupération des champ des formulaire et le stocker a une variable nb:il doit imperativement recuperer avec la methode get car le formulaire a été soumi par la method get
$emailC=$_GET['email'];
$mdpC=$_GET['mdp'];

//appeler la fonction récupération et y ajouter les données qu'on a récupérer au niveau du champ de formulaire
$resultat=recuperation($emailC,$mdpC);

//condition pour savoir si on a récupérer des données au niveau de la base de données 
if(mysqli_num_rows($resultat)>0){
    $row = mysqli_fetch_assoc($resultat);
    $_SESSION['nom'] = $row['nom'];
    header("location:layout.php");
    exit;
}
else {
   $_SESSION['message-erreur']="Email ou mot de passe incorrect";    //la j'ai crée une session qui contient un message d'erreur si le sinon agit
   header("location:connexion.php");  //aprés sa doit m'amener dans une page ou le message d'erreur sera afficher
   exit;
   
}

?>