<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <style>
         .container {
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .etudiant-infos{
            
            margin-bottom: 40px; /*faire descendre tout les élément qui se trouve en bas de se style */
           
        }

        .etudiant-infos label {
            font-weight: bold;
            display: block;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            
        }
       
        table td{
            
            border: 1px solid #ddd;
            text-align: left;
        }

        

    

      
.image{
    width: 20px;
    height: 20px;
    vertical-align: middle;
}


    </style>
</head>
<body>
<?php
include("header.php");
include("top_bar.php");
include("left_sidebar.php");
?>

<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col-sm-12">
                <div class="page-sub-header">
                  <h3 class="page-title"></h3>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="students.html">Student</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Students</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card comman-shadow">
                <div class="card-body">
                <a href="ecole.php"><button type="button" class="btn btn-primary">
     Retour
  </button></a> <br> <br>

  
        <h1>Gestion des Dossiers des Étudiants</h1>
    </header>

 
<div class="container">



<!-- Informations sur l'étudiant -->
<div class="etudiant-infos">
<?php
$student_id= $_GET['id'];

include("connexion-BD.php");
$sql="SELECT user.prenom AS prenom_user, user.nom AS nom_user, user.email, user.cni AS cni_user, formation.nom AS nom_formation
    FROM user
    JOIN formation ON user.formation_id = formation.id
    WHERE user.id = $student_id";
                        
    $resultat=mysqli_query(getconnexion(),$sql);
    while($row= mysqli_fetch_assoc($resultat)){ 
        ?>

<label for="">Prenom: <?php echo $row['prenom_user'];?></label> <br>
<label for="">Nom: <?php echo $row['nom_user'];?></label> <br>
<label for="">Email: <?php echo $row['email'];?></label> <br>
<label for="">Cni: <?php echo $row['cni_user'];?></label> <br>
<label for="">Formation choisi: <?php echo $row['nom_formation'];?></label> 

<?php
    } 
    ?>

</div>




 


<button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#bs-example-modal-lg">
    Charger un CV ou un Cours
  </button>

<table class="datatable table table-stripped">

<?php

        

include_once("connexion-BD.php");
function executeSQL($sql){    
    $execution=mysqli_query(getConnexion(), $sql);   
    return $execution;                              
    }
    $sql="SELECT * FROM fichiers 
      WHERE user_id = $student_id";
    
        $resultat=mysqli_query(getconnexion(), $sql);
        if(mysqli_num_rows($resultat)>0){
        
            ?>
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Nom</th>
                          <th colspan="2">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                $fichiers = [];
                while($row= mysqli_fetch_assoc($resultat)){  //cette fonction prend le résultat de la requete sql et renvoi une ligne sous forme de tableau associatif et stocker le tableau dans $row  et la boucle while permet de parcourrir tout les ligne de la base de donnée car en haut on a juste mis select*from user sans préciser l'id donc on sélectionne tout les lignes et la boucle va parcourir chaque ligne et l'afficher
                    $fichiers[] = [
                        'chemin' => $row['chemin'],
                        'nom' => $row['nom'],
                        'id' => $row['id'],
                        'user_id' => $row['user_id']

                    ];
                }
                    if (!empty($fichiers)) {
                        foreach ($fichiers as $fichier) {
            
                ?>
                        <tr>
                          <td><?php echo "<p> <img   class='image dossiers' src='pdf.png' alt='Dossier'> </p>";?></td>
                          <td><?php echo $fichier['nom'];?></td>
                          <td ><?php echo "<p><a href='" . $fichier['chemin'] . "' target='_blank' class='btn btn-primary'> Ouvrir </a></p>";?></td>
                          <td ><?php echo "<p class='btn btn-danger imagee'  data-id='{$fichier['id']}'> Supprimer </p>";?></td>
                          
                        </tr>
                        <?php
            }
        }
        
         
        ?>
                        </tbody>
                        <?php
    } else {
        // Aucun fichier trouvé
        ?>
        <tr><td colspan="4">Aucun fichier disponible.</td></tr>
        <?php
    }
    ?>

                    </table>


                
              </div>
            </div>
          </div>
        </div>
      </div>



      

      
<?php
include("footer.php");

?>
<script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/js/script.js"></script>

    <div
                    class="modal fade"
                    id="bs-example-modal-lg"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="myLargeModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myLargeModalLabel">
                            IMPORTER UN FICHIER PDF
                          </h4>

                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">

                        <div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form  action="telchrgement_pdf.php?id=<?php echo $student_id;?>" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
</div>

        <input type="file" name="uploaded_file" required>
        <div class="col-12">
<div class="student-submit">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</div>
        
        


</div>
</form>
</div>
</div>
</div>
</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <dialog  id="deleteDialog">
  <p>VOULEZ VOUS SUPPRIMER LE FICHIER</p>
  <form method="dialog">
   <button type="button" class="ok"  id="confirmDelete">OK</button> 
    <button class="annuler"   id="cancelDelete">Annuler</button>
  </form>
</dialog>

 <dialog  id="dialog" >


<script>

const liste = document.querySelectorAll('.imagee');
const confirmBtn = document.getElementById('confirmDelete'); // Le bouton "OK"
let itemIdToDelete = null; // Variable pour stocker l'ID
const n = liste.length;
    for(let i=0; i<n; i++){
        liste[i].addEventListener("click", () => {
            document.getElementById("deleteDialog").showModal();
            itemIdToDelete = liste[i].getAttribute('data-id'); //stock l'attribut data-id dans ce variable

    });
    confirmBtn.addEventListener('click', function() {
    if (itemIdToDelete) {
      // Rediriger ou effectuer l'action de suppression avec l'ID       window.location est un objet JavaScript qui contient des informations sur l'URL actuelle de la page.     href est une propriété de window.location qui représente l'URL complète de la page actuelle.        En modifiant la valeur de window.location.href, vous pouvez rediriger l'utilisateur vers une nouvelle page ou URL. C'est l'équivalent d'un clic sur un lien dans une page web.
      window.location.href = `deletefichier.php?id=${itemIdToDelete}`; // Exemple de redirection
    }
  });

}
  
</script>


</body>
</html>