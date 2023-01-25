<?php
	try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
   }
   catch (Exception $e) {
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
          <input type="int" name="Statut" placeholder="Statut" /><br />
      <button type="submit" value="Envoyer">Envoyer</button>
</form>
</html>
<?php
if(isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Photo"]) && isset($_POST["NumLicence"]) && isset($_POST["DateNaissance"]) && isset($_POST["Taille"]) && isset($_POST["Poids"]) && isset($_POST["Statut"])){
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $photo = $_POST["Photo"];
    $numLicence = $_POST["NumLicence"];
    $dateNaissance = $_POST["DateNaissance"];
    $taille = $_POST["Taille"];
    $poids = $_POST["Poids"];
    $statut = $_POST["Statut"];

    $res= $linkpdo->prepare('INSERT INTO joueurs (Nom, Prenom, Photo, NumLicence, DateNaissance, Taille, Poids, Statut) VALUES ( :nom, :prenom, :photo, :numLicence, :dateNaissance, :taille, :poids, :statut)');
    $res->bindParam(':nom', $nom);
    $res->bindParam(':prenom', $prenom);
    $res->bindParam(':photo', $photo);
    $res->bindParam(':numLicence', $numLicence);
    $res->bindParam(':dateNaissance', $dateNaissance);
    $res->bindParam(':taille', $taille);
    $res->bindParam(':poids', $poids);
    $res->bindParam(':statut', $statut);
    if($res->execute()){
        echo "La requête a été exécutée avec succès";
    }else{
        $res->DebugDumpParams();
        echo "La requête a échouée";
    }
}
?>