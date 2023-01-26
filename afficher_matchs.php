<?php
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
?>
<table border="1">
    <tr>
        <th>Date</th>
        <th>Heure</th>
        <th>Lieu</th>
        <th>Equipe adverse</th>
        <th>Domicile</th>
        <th>Score</th>
        <th>ScoreAdverse</th>
        <th>Actions</th>
    </tr>
    <?php
    $res = $linkpdo->prepare("SELECT * FROM matchs");
    $res->execute();
    while ($data = $res->fetch()) {
        ?>
        <form method="post" action="">
            <tr>
                <td>
                    <input type="text" name="Date" value="<?php echo $data['Date']; ?>">

                </td>
                <td>
                    <input type="text" name="Heure" value="<?php echo $data['Heure']; ?>">
                </td>
                <td>
                    <input type="text" name="Lieu" value="<?php echo $data['Lieu']; ?>">
                </td>
                <td>
                    <input type="text" name="NomEquipeAdverse" value="<?php echo $data['NomEquipeAdverse']; ?>">
                </td>
                <td>
                    <input type="text" name="Domicile" value="<?php if ($data['Domicile'] == 1) {
                        echo 'oui';
                    } else {
                        echo 'non';
                    } ?>">
                </td>
                <td>
                    <input type="text" name="ScoreE" value="<?php echo $data['ScoreE']; ?>">
                </td>
                <td>
                    <input type="text" name="ScoreA" value="<?php echo $data['ScoreA']; ?>">
                <td>
                    <button type="submit" name="update" value="update">Modifier</button>
                    <button type="submit" name="delete" value="delete">Supprimer</button>
                    <input type="hidden" name="Id_Match" value="<?php echo $data['Id_Match']; ?>">
                </td>
            </tr>
        </form>
        <?php
    }
    if (isset($_POST['update'])) {
        $Id_Match = $_POST["Id_Match"];
        $date = $_POST["Date"];
        $heure = $_POST["Heure"];
        $lieu = $_POST["Lieu"];
        $nomEquipeAdverse = $_POST["NomEquipeAdverse"];
        $domicile = $_POST["Domicile"];
        $scoreE = $_POST["ScoreE"];
        $scoreA = $_POST["ScoreA"];
        if ($domicile == 'oui') {
            $domicile = 1;
        } else {
            $domicile = 0;
        }

        $update = $linkpdo->prepare("UPDATE matchs SET Date = :date, Heure = :heure, Lieu = :lieu, NomEquipeAdverse = :nomEquipeAdverse, Domicile = :domicile, ScoreE = :scoreE, ScoreA = :scoreA WHERE Id_Match = :Id_Match");
        $update->bindParam(':date', $date);
        $update->bindParam(':heure', $heure);
        $update->bindParam(':lieu', $lieu);
        $update->bindParam(':nomEquipeAdverse', $nomEquipeAdverse);
        $update->bindParam(':domicile', $domicile);
        $update->bindParam(':scoreE', $scoreE);
        $update->bindParam(':scoreA', $scoreA);
        $update->bindParam(':Id_Match', $Id_Match);
        if ($update->execute()) {
            echo "Mise à jour réussie";
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $res->DebugDumpParams();
            echo "Erreur lors de la mise à jour";
        }
    }
    if (isset($_POST['delete'])) {
        $Id_Match = $_POST["Id_Match"];
        $delete = $linkpdo->prepare("DELETE FROM matchs WHERE Id_Match = :Id_Match");
        $delete->bindParam(':Id_Match', $Id_Match);
        if($delete->execute()){
            echo "Suppression réussie";
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            $res->DebugDumpParams();
            echo "Erreur lors de la suppression";
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

th, td {
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