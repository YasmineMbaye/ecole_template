<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Register</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="assets/img/login.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Formulaire d'inscription</h1>
<p class="account-subtitle">Entrez les détails pour créer votre compte</p>

<form method="POST" action="trait-inscription.php">
<div class="form-group">
<label>Username <span class="login-danger">*</span></label>
<input class="form-control" type="text" name="nom" required>
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" type="text" name='email' required>
<span class="profile-views"><i class="fas fa-envelope"></i></span>
</div>
<div class="form-group">
<span id="msg"></span>
<label>Password <span class="login-danger">*</span></label>
<input class="form-control pass-input" type="text" name='mdp' required minlength="8" maxlength="10">
<span class="profile-views feather-eye toggle-password"></span>
</div>

<div class=" dont-have">Déjà inscrit? <a href="connexion.php">Se connecter</a></div>
<div class="form-group mb-0">
<button class="btn btn-primary btn-block" type="submit" name="ajout" id="inscrit">S'inscrire</button>
</div>
</form>

<div class="login-or">
<span class="or-line"></span>
<span class="span-or">or</span>
</div>

<div class="social-login">
<a href="#"><i class="fab fa-google-plus-g"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-linkedin-in"></i></a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

<script src="mdp.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>