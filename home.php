<!-- home.php -->
<?php
session_start();

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Contenu de la page</p>
</body>
</html>