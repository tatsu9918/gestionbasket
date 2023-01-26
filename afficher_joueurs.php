<?php
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Photo</th>
        <th>Num de licence</th>
        <th>Date de naissance</th>
        <th>Taille</th>
        <th>Poids</th>
        <th>Poste préféré</th>
        <th>Statut</th>
        <th>Commmentaire</th>
        <th>Actions</th>
    </tr>
    <?php
    $res = $linkpdo->prepare("SELECT * FROM joueurs");
    $res->execute();
    while ($data = $res->fetch()) {
        ?>
        <form method="post" action="">
            <tr>
                <td>
                    <input type="text" name="Nom" value="<?php echo $data['Nom']; ?>">
                </td>
                <td>
                    <input type="text" name="Prenom" value="<?php echo $data['Prenom']; ?>">
                </td>
                <td>
                    <input type="text" name="Photo" value="<?php echo $data['Photo']; ?>">
                </td>
                <td>
                    <input type="text" name="NumLicence" value="<?php echo $data['NumLicence']; ?>">
                </td>
                <td>
                    <input type="text" name="DateNaissance" value="<?php echo $data['DateNaissance']; ?>">
                </td>
                <td>
                    <input type="text" name="Taille" value="<?php echo $data['Taille']; ?>">
                </td>
                <td>
                    <input type="text" name="Poids" value="<?php echo $data['Poids']; ?>">
                </td>
                <td>
                    <input type="text" name="Poste_pref" value="<?php echo $data['Poste_pref']; ?>">
                </td>
                <td>
                    <input type="text" name="Statut" value="<?php switch ($data['Statut']) {
                        case 1:
                            echo "Actif";
                            break;
                        case 2:
                            echo "Blessé";
                            break;
                        case 3:
                            echo "Suspendu";
                            break;
                        case 4:
                            echo "Absent";
                            break;
                    } ?>">
                </td>
                <td>
                    <input type="text" name="Commentaire" value="<?php echo $data['Commentaire']; ?>">
                </td>
                <td>
                    <button type="submit" name="update" value="update">Modifier</button>
                    <button type="submit" name="delete" value="delete">Supprimer</button>
                </td>
            </tr>
        </form>
        <?php
    }
    if (isset($_POST['update'])) {
        $nom = $_POST["Nom"];
        $prenom = $_POST["Prenom"];
        $photo = $_POST["Photo"];
        $numLicence = $_POST["NumLicence"];
        $dateNaissance = $_POST["DateNaissance"];
        $taille = $_POST["Taille"];
        $poids = $_POST["Poids"];
        $Poste_pref = $_POST["Poste_pref"];
        switch ($_POST["Statut"]) {
            case "Actif":
                $statut = 1;
                break;
            case "Blessé":
                $statut = 2;
                break;
            case "Suspendu":
                $statut = 3;
                break;
            case "Absent":
                $statut = 4;
                break;
        }
        $commentaire = $_POST["Commentaire"];
        $res = $linkpdo->prepare('UPDATE joueurs SET Nom = :nom, Prenom = :prenom, Photo = :photo, NumLicence = :numLicence, DateNaissance = :dateNaissance, Taille = :taille, Poids = :poids, Poste_pref = :Poste_pref, Statut = :statut, Commentaire = :commentaire WHERE NumLicence = :numLicence');
        $res->bindParam(':nom', $nom);
        $res->bindParam(':prenom', $prenom);
        $res->bindParam(':photo', $photo);
        $res->bindParam(':numLicence', $numLicence);
        $res->bindParam(':dateNaissance', $dateNaissance);
        $res->bindParam(':taille', $taille);
        $res->bindParam(':poids', $poids);
        $res->bindParam(':Poste_pref', $Poste_pref);
        $res->bindParam(':statut', $statut);
        $res->bindParam(':commentaire', $commentaire);
        if ($res->execute()) {
            echo "La requête a été exécutée avec succès";
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $res->DebugDumpParams();
            echo "La requête n'a pas été exécutée avec succès";
        }
    }
    if (isset($_POST['delete'])) {
        $numLicence = $_POST["NumLicence"];
        $res = $linkpdo->prepare('DELETE FROM joueurs WHERE NumLicence = :numLicence');
        $res->bindParam(':numLicence', $numLicence);
        if ($res->execute()) {
            echo "La requête a été exécutée avec succès";
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $res->DebugDumpParams();
            echo "La requête n'a pas été exécutée avec succès";
        }
    }
    ?>

</table>


<style>
    table {
        width: 100%;
        font-family: Arial, sans-serif;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }

    .center {
        text-align: center;
    }

    input[type="text"] {
        width: 100%;
        /* padding: 12px 20px; */
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        width: 100%;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        /* cursor: pointer; */
    }

    button[name="update"] {
        background-color: #4CAF50;
    }

    button[name="delete"] {
        background-color: #f44336;
    }

    button[name="delete"]:hover {
        background-color: #9b1107;
    }

    button[name="update"]:hover {
        background-color: #45a049;
    }
</style>