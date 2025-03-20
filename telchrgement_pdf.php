<?php
include("connexion-BD.php");

$user_id = $_GET['id']; 

// Vérifier si un fichier a été téléchargé
if (isset($_FILES['uploaded_file'])) {
    // Récupérer les informations sur le fichier téléchargé
    $tmpName = $_FILES['uploaded_file']['tmp_name'];
    $fileName = $_FILES['uploaded_file']['name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $fileNom = basename($fileName); // Nom original du fichier

    // Vérifier que le fichier est un PDF
    if ($fileExt === 'pdf') {
        // Générer un nom unique pour le fichier PDF
        $uniqueName = md5(uniqid(rand(), true)) . ".pdf";
        $uploadDir = "upload/"; // Dossier où vous stockez les fichiers
        $filePath = $uploadDir . $uniqueName;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($tmpName, $filePath)) {

            $sql = "INSERT INTO fichiers (chemin, nom, user_id) VALUES ('$filePath', '$fileNom', '$user_id')";

            if (mysqli_query(getconnexion(),$sql)) {
               // echo "Fichier téléchargé et chemin enregistré avec succès.";
               header("location:trait_dossier.php?id=$user_id");
            }
            // Rediriger vers la page d'accueil avec le chemin du fichier PDF
            //header("Location: ecole.php?file=" . urlencode($filePath));
            exit();
        } else {
            echo "Erreur lors du transfert du fichier PDF.";
        }
    } else {
        echo "Veuillez télécharger un fichier au format PDF uniquement.";
    }
}
?>
