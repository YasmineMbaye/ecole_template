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
  </head>

  <body>
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
  <a href="ecole.php"><button type="button" class="btn btn-info btn-sm d-flex align-items-center">
     Retour
  </button></a>
</div>

    </div>
                    <table class="datatable table table-stripped">
                      <thead>
                      
                        <tr>
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Cni</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     <?php include("connexion-BD.php");
$sql="SELECT * FROM user ORDER BY id DESC";
$resultat=mysqli_query(getconnexion(),$sql);
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche= htmlspecialchars($_GET['s']);
    //la on selectionne ce qu'on veut afficher et rechercher en fonction du nom qu'on a entrer Le LIKE "%$recherche%" signifie que la recherche affichera tous les noms contenant la chaîne que vous avez recherchée, même s'il y a un ou plusieurs caractères avant ou après cette chaîne.
    $sql="SELECT id, prenom, nom, email, cni  FROM user WHERE nom LIKE \"%$recherche%\" ORDER BY id DESC";
    $resultat=mysqli_query(getconnexion(),$sql);
} 
if(mysqli_num_rows($resultat)>0){ ?>
            
            <!--pour les autres ligne on a utiliser une boucle qui permet de prendre le résultat obtenu au niveau et le mettre dans un variable appelée $row et le tableau aura deux ligne clé et valeur; les valeur sera le résultat obtenu aprés la requete sql et la clé sera les idifiant qui se trouve au niveau de la base de donnée comme: nom, email, mdp-->
            <?php
while($row= mysqli_fetch_assoc($resultat)){
    ?>
                        <tr>
                          <td><?php echo $row['prenom'];?></td>
                          <td><?php echo $row['nom'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td> <?php echo $row['cni'];?> </td>
                          <td></td>
                          
                        </tr>
                        
                        <?php
            }
        } else{
          ?>
          <p>Aucun utilisateur trouvé</p>
          <?php
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

    
  </body>
</html>
