<?php

//fonction pour se connecter a a la de données
function getconnexion(){
    $host= "localhost";
    $user="root";
    $password= "";
    $dbname= "ecole";

    $connexion= mysqli_connect($host, $user, $password, $dbname);

    return $connexion;

}

?>