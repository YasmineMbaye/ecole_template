<?php
session_start();
$user_id= $_GET['id'];   //La on a utiliser la methode GET pour récupérer l'id qu'on a préciser au niveau du fichier ecole.php en plus on a utiliser la méthode get car Par défaut, les liens HTML(<a>) utilisent la méthode GET pour passer des paramètres via l'URL,donc pour le récupérer il va falloir utiliser la méthode GET  
include("connexion-BD.php");//on inclu le fichier qui contient la connexion a la base de donnée 
$sql="DELETE FROM user WHERE id= $user_id"; //on écrit la requete sql qu'on a besoin et le stocker sans une variable 
if(mysqli_query(getconnexion(),$sql)){   //mysqli est utilisée en PHP pour exécuter une requête SQL sur une base de données MySQL et vérifier si cette exécution a réussi ou échoué. Cette partie vérifie le résultat de la fonction mysqli_query(). Si la requête s'exécute avec succès, elle renvoie true, ce qui signifie que l'instruction if sera vraie, et le code à l'intérieur des accolades sera exécuté.
            //si la condition est vrai sa la page ecole.php sera afficher
    $_SESSION['message-erreur']=" L'utilisateur a été supprimer avec succés";    //la j'ai crée une session qui contient un message d'erreur si le sinon agit
    header("location:ecole.php");  //aprés sa doit m'amener dans une page ou le message d'erreur sera afficher
   exit;
}
