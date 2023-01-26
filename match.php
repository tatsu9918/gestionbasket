<?php
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>
<html>
<form id="" method="post" action="">
    Date du match <input type="date" name="Date" placeholder="Date du match"/><br />
    Heure du match <input type="time" name="Heure" placeholder="Heure du match" /><br />
    <input type="text" name="Lieu" placeholder="Lieu du match" /><br />
    <input type="text" name="NomEquipeAdverse" placeholder="NomEquipeAdverse" /><br />
    <input type="hidden" name="Domicile" value=0 >
    <input id="domicile" type="checkbox" name="Domicile" value=1 >
    <label for="domicile">Domicile</label>
    <button type="submit" value="Envoyer">Envoyer</button>
</form>
</html>
<?php
if (isset($_POST["Date"]) && isset($_POST["Heure"]) && isset($_POST["Lieu"]) && isset($_POST["NomEquipeAdverse"])&& isset($_POST["Domicile"])){
    $date = $_POST["Date"];
    $heure = $_POST["Heure"];
    $lieu = $_POST["Lieu"];
    $NomEquipeAdverse = $_POST["NomEquipeAdverse"];
    $domicile = $_POST["Domicile"];
$res = $linkpdo->prepare('INSERT INTO matchs (Date, Heure, Lieu, NomEquipeAdverse, Domicile) VALUES ( :date, :heure, :lieu, :NomEquipeAdverse, :domicile)');
$res->bindParam(':date', $date);
$res->bindParam(':heure', $heure);
$res->bindParam(':lieu', $lieu);
$res->bindParam(':NomEquipeAdverse', $NomEquipeAdverse);
$res->bindParam(':domicile', $domicile);
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