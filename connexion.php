<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Login</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

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
<h1>Bienvenue à l'école maternelle</h1>
<p class="account-subtitle">Besoin d'un compte? <a href="inscription.php">S'inscrire</a></p>
<h2>Se connecter</h2>

<form method="GET" action="trait-connexion.php">
<?php 
    session_start();
    if(isset($_SESSION['message-erreur'])){   //La j'ai poser une condition si la variable dollard session n'est pas nul sa veut qu'il contient un message 
        echo "<p>".$_SESSION['message-erreur']."</p>"; //alors on affiche le message ici 
        unset($_SESSION['message-erreur']); // Ensuite on Efface le message après affichage lors du rechargement de la page
    }
    ?> 
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" type="email" name='email' required>
<span class="profile-views"><i class="fas fa-envelope"></i></span>
</div>
<div class="form-group">
<label>Password <span class="login-danger">*</span></label>
<input class="form-control pass-input" type="text" name='mdp' required>
<span class="profile-views feather-eye toggle-password"></span>
</div>

<div class="form-group">
<button class="btn btn-primary btn-block" type="submit" name="ajout">Se connecter</button>
</div>
</form>

<div class="login-or">
<span class="or-line"></span>
<span class="span-or">ou</span>
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


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>