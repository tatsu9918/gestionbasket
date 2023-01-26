<?php
session_start();

try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['logged_in'])) {
    header('Location:authentification.php');
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
</body>
</html>


<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    }

    header {    
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1em;
    }

    nav {
    background-color: #f9f9f9;
    text-align: center;
    padding: 1em;
    }

    nav a {
    color: #4CAF50;
    text-decoration: none;
    padding: 1em;
    }

    nav a:hover {
    background-color: #4CAF50;
    color: white;
    }

    section {
    padding: 2em;
    }

    h1 {
    text-align: center;
    margin-top: 2em;
    }

    p {
    text-align: justify;
    margin-top: 1em;
    }
</style>