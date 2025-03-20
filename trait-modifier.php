<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
     $users_id= $_GET['id']; // L'ID peut rester en GET car il est transmis dans l'URL      L'utilisateur accède à modifier.php?id=1 via GET pour indiquer quel utilisateur est concerné (l'ID 1). Le formulaire de cette page récupère cet ID, mais utilise POST pour envoyer les informations modifiées (nom et email) en toute sécurité.
     $user_prenom= $_POST['prenom'];
     $user_name= $_POST['name'];
     $user_email= $_POST['email'];
     $user_cni= $_POST['cni'];
     
    
    if(isset($_POST['submit'])){
        include("connexion-BD.php");
        $sql= "UPDATE user SET prenom= '$user_prenom', nom='$user_name', email='$user_email', cni='$user_cni' WHERE id=$users_id";

        if(mysqli_query(getconnexion(),$sql)){
            $_SESSION['message-modifier']=" L'utilisateur a été modifier avec succés"; 
             header("location:ecole.php");  //aprés sa doit m'amener dans une page ou le message d'erreur sera afficher
           
        }
    }

    
?>
</body>
</html>