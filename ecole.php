<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Preskool - Data Tables</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
      rel="stylesheet"/>

    <link
      rel="stylesheet"
      href="assets/plugins/bootstrap/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="assets/plugins/feather/feather.css" />

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/datatables/datatables.min.css"/>

    <link rel="stylesheet" href="assets/css/style.css" />

    
<!--lien pour l'icon de suppression-->
<link rel="stylesheet" href="assets/plugins/icons/ionic/ionicons.css">


  </head>

  <body>

  <?php
    session_start();
    
    
    if(!isset($_SESSION['nom'])){
        header("location:connexion.php");
    }
    ?>

    <div class="main-wrapper">
   <?php include("top_bar.php"); ?>

      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
      <?php  include("left_sidebar.php"); ?>
        </div>
      </div>

      <div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col">
                <h3 class="page-title">Ecole</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Ecole</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-2">Description</h5>
                  <p class="card-text">
                  Établissement où l'on donne un enseignement collectif général. 2. Institution chargée de donner un enseignement collectif général aux enfants d'âge scolaire et préscolaire
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                  <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center mb-4">
  <!-- Bouton Ajouter -->
  <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#bs-example-modal-lg">
     Ajouter un élève
  </button>

  <!-- Barre de recherche -->
  <form action="recherche.php" method="GET" class="d-flex">
    <div class="input-group">
      <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
      <input type="search" name="s" class="form-control" placeholder="Rechercher ici" aria-label="Search"/>
      <button class="btn btn-primary" type="submit">Rechercher</button>
    </div>
  </form>
</div>


    <!-- Import/Export Section -->
    <form action="enregistrementfichier.php" method="POST" enctype="multipart/form-data">
      <div class="d-flex align-items-center">
      <!-- Importer un fichier -->
      <div class="me-3">
        <input type="file" class="form-control form-control-sm" name="import_file">
      </div>

      <!-- Bouton Import -->
      <button class="btn btn-success btn-sm me-2" type="submit" name="save_excel_data" id="import">Import</button>

      <!-- Menu déroulant -->
      <div class="dropdown me-2">
      <select name="export_file" id="" class="btn btn-secondary btn-sm dropdown-toggle" >
        <option value="xlsx">xlsx</option>
            <option value="csv">csv</option>
        </select>
        
      </div>

      <!-- Bouton Export -->
      <button class="btn btn-outline-primary btn-sm" name="export_excel_btn" >Export</button>
    </div>
  </form>
    </div>
                    <table class="datatable table table-stripped">
                      <thead>
                      
                        <tr>
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Cni</th>
                          <th class="text-end">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php

include_once("connexion-BD.php");
function executeSQL($sql){    
    $execution=mysqli_query(getConnexion(), $sql);   
    return $execution;                              
    }
?>
<?php
$sql="SELECT * FROM user ";
        $resultat=mysqli_query(getconnexion(), $sql);
        if(mysqli_num_rows($resultat)>0){
        
            ?>
            
            <!--pour les autres ligne on a utiliser une boucle qui permet de prendre le résultat obtenu au niveau et le mettre dans un variable appelée $row et le tableau aura deux ligne clé et valeur; les valeur sera le résultat obtenu aprés la requete sql et la clé sera les idifiant qui se trouve au niveau de la base de donnée comme: nom, email, mdp-->
                <?php
                while($row= mysqli_fetch_assoc($resultat)){  //cette fonction prend le résultat de la requete sql et renvoi une ligne sous forme de tableau associatif et stocker le tableau dans $row  et la boucle while permet de parcourrir tout les ligne de la base de donnée car en haut on a juste mis select*from user sans préciser l'id donc on sélectionne tout les lignes et la boucle va parcourir chaque ligne et l'afficher
                
            
                ?>
                        <tr>
                          <td><?php echo $row['prenom'];?></td>
                          <td><?php echo $row['nom'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['cni'];?></td>
                          <td class="text-end">
                            <div class="actions ">
                             <a href="trait_dossier.php?id=<?php echo $row['id'];?>" class="btn btn-sm bg-success-light me-2 " >
                              <i class="feather-eye"></i>
                              </a> 
                              
                            <!--  <button class=" bg-danger-light btn btn-sm" type="button"class="btn btn-info mt-1" data-bs-toggle="modal" data-bs-target="#login-modal" data-id=<?php echo $row['id'];?>  data-prenom="<?php echo $row['prenom']; ?>" data-nom="<?php echo $row['nom']; ?>" data-email="<?php echo $row['email']; ?>" data-cni="<?php echo $row['cni']; ?>"  data-formation="<?php echo $row['formation_id'];?>" >
                              <i class="feather-eye"></i>
                              </button> -->
                             <!-- <a href="modifier.php?id=<?php echo $row['id'];?>" class="btn btn-sm bg-danger-light image  imagee" 
                                  > 
                              <i class="feather-edit"></i>
                              </a> -->
                               <button   class="btn btn-sm bg-danger-light open-modal"  type="button" data-bs-toggle="modal" data-bs-target="#signup-modal" data-id=<?php echo $row['id'];?>  data-prenom="<?php echo $row['prenom']; ?>" data-nom="<?php echo $row['nom']; ?>" data-email="<?php echo $row['email']; ?>" data-cni="<?php echo $row['cni']; ?>">  
                                  
                                   <i class="feather-edit" ></i>  
                                  </button>
                       
                                  <button class="btn btn-sm bg-success-light me-2 " type="button open-modal"
                      data-bs-toggle="modal"
                      data-bs-target="#full-width-modal" data-id=<?php echo $row['id'];?>> 
                                  <i class="ion-trash-a" ></i>
                                  </button>

                            </div>
                          </td>
                          
                        </tr>
                        
                        <?php
            }
        } 
        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include("footer.php"); ?>
      </div>
    </div>
    

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <script src="assets/js/script.js"></script>

    <!--modal pour ajouter un éléve-->

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
                            AJOUTER UN ELEVE
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
<form  action="trait-adduser.php" method="POST">
<div class="row">
<div class="col-12">

</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Prenom <span class="login-danger">*</span></label>
<input type="text" name="prenom" class="form-control" placeholder="Enter Prenom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Name <span class="login-danger">*</span></label>
<input type="text" name="utilisateur" class="form-control" placeholder="Enter Nom">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Email <span class="login-danger">*</span></label>
<input type="text" name="email" class="form-control" placeholder="Enter Email">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Cni <span class="login-danger">*</span></label>
<input type="text" name="cni" class="form-control" placeholder="Enter Cni">
</div>
</div>

<div class="col-12">
<h5 class="form-title"><span>Choisissez votre Formation</span></h5>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Gender <span class="login-danger">*</span></label>
<select class="form-control select" name="formation_id" id="">

<?php
                include_once("connexion-BD.php");
                $sql="SELECT id, nom FROM formation";
                $resultat=mysqli_query(getconnexion(),$sql);
                while($row=mysqli_fetch_assoc($resultat)){
                
            ?>
        <option  value="<?php echo $row["id"]; ?>"><?php echo $row["nom"]; ?></option>
        <?php
              }
             ?>
             
</select>

</div>
</div>



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

                  
                  
<!--modal pour modifier un éléve-->

<div
                    id="signup-modal"
                    class="modal fade"
                    tabindex="-1"
                    role="dialog"
                    aria-hidden="true"
                  >


                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myLargeModalLabel">
                            MODIFIER UN ELEVE
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
<form id="editUserForm" action="trait-adduser.php" method="POST">
<input type="hidden" name="id" id="userId"> <!-- Champ caché pour l'ID -->
<div class="row">
<div class="col-12">

</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Prenom <span class="login-danger">*</span></label>
<input type="text" name="prenom" class="form-control" placeholder="Enter Prenom" id="prenomInput">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Name <span class="login-danger">*</span></label>
<input type="text" name="name" class="form-control" placeholder="Enter Nom"  id="nomInput">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Email <span class="login-danger">*</span></label>
<input type="text" name="email" class="form-control" placeholder="Enter Email" id="emailInput">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Cni <span class="login-danger">*</span></label>
<input type="text" name="cni" class="form-control" placeholder="Enter Cni" id="cniInput">
</div>
</div>



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

                  
                  
<!--modal pour supprimer un éléve-->

<div
                    id="full-width-modal"
                    class="modal fade"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="fullWidthModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-full-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="fullWidthModalLabel">
                            SUPPRESSION
                          </h4>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <h6>VOULEZ VOUS SUPPRIMER L'UTILISATEUR</h6>
                          
                          
                        </div>
                        <div class="modal-footer">
                          <button
                            type="button"
                            class="btn btn-light"
                            data-bs-dismiss="modal"
                          >
                            Close
                          </button>
                          <button type="button" class="btn btn-primary" id="confirmDelete">
                            Confirmer
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>




                  
                  

                  <script>

                    
  // Récupérer tous les boutons qui ouvrent le modal
  const buttons = document.querySelectorAll('.open-modal');
  
    const deleteButtons = document.querySelectorAll('[data-bs-target="#full-width-modal"]');
    const confirmBtn = document.getElementById('confirmDelete'); // Le bouton de confirmation
    let itemIdToDelete = null;


  // Ajouter un gestionnaire d'événements à chaque bouton
  buttons.forEach(button => {
    button.addEventListener('click', () => {
      // Récupérer les données du bouton
      const id = button.getAttribute('data-id');
      const prenom = button.getAttribute('data-prenom');
      const nom = button.getAttribute('data-nom');
      const email = button.getAttribute('data-email');
      const cni = button.getAttribute('data-cni');

      // Remplir les champs du formulaire dans le modal
      document.getElementById('userId').value = id;
      document.getElementById('prenomInput').value = prenom;
      document.getElementById('nomInput').value = nom;
      document.getElementById('emailInput').value = email;
      document.getElementById('cniInput').value = cni;

      // Modifier l'action du formulaire pour inclure l'ID dans l'URL
      document.getElementById('editUserForm').action = `trait-modifier.php?id=${id}`;
    });
  });


// Ajouter un événement sur chaque bouton de suppression
deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            itemIdToDelete = button.getAttribute('data-id'); // Récupérer l'ID
           // console.log("ID sélectionné pour suppression :", itemIdToDelete);
        });
    });

    confirmBtn.addEventListener("click", function () {
        if (itemIdToDelete) {
            console.log("Suppression en cours de l'ID :", itemIdToDelete);
            window.location.href = `delete.php?id=${itemIdToDelete}`;
        } /*else {
            console.log("Aucun ID sélectionné !");
        } */
    });

  
</script>

<!--modal pour le dossier des Etudiants un éléve-->
<div
                    id="login-modal"
                    class="modal fade"
                    tabindex="-1"
                    role="dialog"
                    aria-hidden="true"
                  >

                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myLargeModalLabel">
                            Gestion des eleves
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
                        <h3>Gestion des Dossiers des Étudiants</h3>

                        <p id="modalPrenom"></p>
        <p id="modalNom"></p>
        <p id="modalEmail"></p>
        <p id="modalCni"></p>
        <p id="modalFormation"></p>

                        </div>

                        <button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#bs-example-modal-lg">
    Charger un CV ou un Cours
  </button>

  


  
                        </div>
                        </div>
                      </div>

                    
</div>

<script>
  
  document.querySelectorAll('[data-bs-target="#login-modal"]').forEach(button => {
        button.addEventListener("click", function() {
            // Remplir les informations de l'étudiant dans la modal
            document.getElementById("modalPrenom").textContent = "Prénom: " + this.dataset.prenom;
            document.getElementById("modalNom").textContent = "Nom: " + this.dataset.nom;
            document.getElementById("modalEmail").textContent = "Email: " + this.dataset.email;
            document.getElementById("modalCni").textContent = "CNI: " + this.dataset.cni;
            document.getElementById("modalFormation").textContent = "Formation: " + this.dataset.formation;

            
        });
    });

</script>

                  
  </body>
</html>
