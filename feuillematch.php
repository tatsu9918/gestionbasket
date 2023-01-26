<?php
        try {
         $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
        } catch (Exception $e) {
         die('Error : ' . $e->getMessage());
        }
?>
<form action="update_roles.php" method="post">
    <table border="1">
        <tr>
            <th>Photo</th>
            <th>Taille</th>
            <th>Poids</th>
            <th>Poste préféré</th>
            <th>Statut</th>
            <th>Commmentaire</th>
            <th>Evaluations de l'entraineur</th>
            <th>Actions</th>  
        </tr>
        <?php
            // Sélection des joueurs actifs
            $res= $linkpdo->prepare("SELECT * FROM joueurs WHERE STATUT=1");
            $res->execute();
            while ($data = $res->fetch()) {
                echo "<tr>";
                echo "<td>" . $data['photo'] . "</td>";
                echo "<td>" . $data['taille'] . "</td>";
                echo "<td>" . $data['poids'] . "</td>";
                echo "<td>" . $data['poste_prefere'] . "</td>";
                echo "<td>" . $data['statut'] . "</td>";
                echo "<td>" . $data['commentaire'] . "</td>";
                echo "<td>" . $data['evaluations_entraineur'] . "</td>";
                echo "<td><input type='checkbox' name='joueur_titulaire[]' value='" . $data['id'] . "'> Titulaire</td>";
                echo "</tr>";
            }
            if(isset($_POST['update'])) {
                $photo = $_POST["Photo"];
                $dateNaissance = $_POST["DateNaissance"];
                $taille = $_POST["Taille"];
                $poids = $_POST["Poids"];
                $Poste_pref = $_POST["Poste_pref"];
                $statut = $_POST["Statut"];
                $commentaire = $_POST["Commentaire"];
    ?>
            </table>
    <input type="submit" value="Valider la sélection" id="submit-button">
</form>

<?php 
if
      

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