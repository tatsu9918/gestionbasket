<?php
session_start();

// Connexion à la base de données
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Vérification des informations d'authentification
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    
    if ($result->num_rows > 0) {
        // L'utilisateur est connecté
        $_SESSION['logged_in'] = true;
        header('Location: /home.php');
    } else {
        // Les informations d'authentification sont incorrectes
        echo 'Informations d\'authentification incorrectes';
    }
}

// Affichage du formulaire de connexion
if (!isset($_SESSION['logged_in'])) {
    echo '
    <form action="login.php" method="post">
        <label for="username">Nom d\'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Connexion">
    </form>';
}
?>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

form {
    width: 300px;
    margin: 50px auto;
    padding: 25px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #f9f9f9;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type=submit] {
    width: 100%;
    padding: 12px 20px;
    margin-top: 20px;
    background-color: #4CAF

}
</style>