<?php
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>
<html>
<form id="" method="post" action="">
    <input type="text" name="Nom" placeholder="Nom" /><br />
    <input type="text" name="Prenom" placeholder="Prénom" /><br />
    <input type="text" name="Photo" placeholder="Photo" /><br />
    <input type="text" name="NumLicence" placeholder="Numéro de Licence" /><br />
    <input type="date" name="DateNaissance" placeholder="Date de Naissance" /><br />
    <input type="int" name="Taille" placeholder="Taille" /><br />
    <input type="int" name="Poids" placeholder="Poids" /><br />
    <input type="text" name="Poste_pref" placeholder="Poste" /><br />
    <input type="int" name="Statut" placeholder="Statut" /><br />
    <input type="text" name="Commentaire" placeholder="Commentaire" /><br />
    <button type="submit" value="Envoyer">Envoyer</button>
</form>

</html>
<?php
if (isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Photo"]) && isset($_POST["NumLicence"]) && isset($_POST["DateNaissance"]) && isset($_POST["Taille"]) && isset($_POST["Poids"]) && isset($_POST["Poste_pref"]) && isset($_POST["Statut"]) && isset($_POST["Commentaire"])) {
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $photo = $_POST["Photo"];
    $numLicence = $_POST["NumLicence"];
    $dateNaissance = $_POST["DateNaissance"];
    $taille = $_POST["Taille"];
    $poids = $_POST["Poids"];
    $Poste_pref = $_POST["Poste_pref"];
    $statut = $_POST["Statut"];
    $Commentaire = $_POST["Commentaire"];
    $res = $linkpdo->prepare('INSERT INTO joueurs (Nom, Prenom, Photo, NumLicence, DateNaissance, Taille, Poids, Poste_pref, Statut, Commentaire) VALUES ( :nom, :prenom, :photo, :numLicence, :dateNaissance, :taille, :poids, :Poste_pref, :statut, :Commentaire)');
    $res->bindParam(':nom', $nom);
    $res->bindParam(':prenom', $prenom);
    $res->bindParam(':photo', $photo);
    $res->bindParam(':numLicence', $numLicence);
    $res->bindParam(':dateNaissance', $dateNaissance);
    $res->bindParam(':taille', $taille);
    $res->bindParam(':poids', $poids);
    $res->bindParam(':Poste_pref', $Poste_pref);
    $res->bindParam(':statut', $statut);
    $res->bindParam(':Commentaire', $Commentaire);
    if ($res->execute()) {
        echo "les données ont été ajouté avec succès";
    } else {
        $res->DebugDumpParams();
        echo "La requête a échouée";
    }
}
?>
<style>
    form {
    width: 300px;
    margin: 0 auto;
    text-align: center;
}

input[type="text"], input[type="date"], input[type="int"] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}

input[type="text"]:focus, input[type="date"]:focus, input[type="int"]:focus {
    border: 2px solid #555;
}

button[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>