<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                  <h3 class="page-title">Modifier un Eleve</h3>
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
                <?php
    $user_id= $_GET['id'];
    include("connexion-BD.php");
    $sql="SELECT * FROM user where id=$user_id";
    $resultat=mysqli_query(getconnexion(),$sql);
    while($row=mysqli_fetch_assoc($resultat)){


?>
                  <form action="trait-modifier.php?id=<?php echo $row["id"];?>" method="POST">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title student-info">
                          Information de l'éléve
                          <span
                            ><a href="javascript:;"
                              ><i class="feather-more-vertical"></i></a
                          ></span>
                        </h5>
                      </div>
                      <div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Prenom <span class="login-danger">*</span></label>
<input value=" <?php echo $row["prenom"]; ?>" type="text" name="prenom" class="form-control" placeholder="Enter Prenom">
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Name <span class="login-danger">*</span></label>
<input value=" <?php echo $row["nom"]; ?>" type="text" name="name" class="form-control" placeholder="Enter Nom">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Email <span class="login-danger">*</span></label>
<input value=" <?php echo $row["email"]; ?>" type="text" name="email" class="form-control" placeholder="Enter Email">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Cni <span class="login-danger">*</span></label>
<input value=" <?php echo $row["cni"]; ?>" type="text" name="cni" class="form-control" placeholder="Enter Cni">
</div>
</div>
                      <div class="col-12">
                        <div class="student-submit">
                          <button type="submit" name="submit" class="btn btn-primary">
                            Modifier
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php
    }
    ?>
                </div>
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
</body>
</html>