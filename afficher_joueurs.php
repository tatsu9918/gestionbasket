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
        <th>Statut</th>
    </tr>
    <?php
        $res= $linkpdo->prepare("SELECT * FROM joueurs");
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
                    <input type="text" name="Statut" value="<?php echo $data['Statut']; ?>">
                </td>
                <td>
                    <button type="submit" name="update" value="update">Modifier</button>
                    <button type="submit" name="delete" value="update">Supprimer</button>
                </td>
            </tr>
        </form>
    <?php
        }
        if(isset($_POST['update'])) {
            $nom = $_POST["Nom"];
            $prenom = $_POST["Prenom"];
            $photo = $_POST["Photo"];
            $numLicence = $_POST["NumLicence"];
            $dateNaissance = $_POST["DateNaissance"];
            $taille = $_POST["Taille"];
            $poids = $_POST["Poids"];
            $statut = $_POST["Statut"];
            $res= $linkpdo->prepare('UPDATE joueurs SET Nom = :nom, Prenom = :prenom, Photo = :photo, NumLicence = :numLicence, DateNaissance = :dateNaissance, Taille = :taille, Poids = :poids, Statut = :statut WHERE NumLicence = :numLicence');
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
            if(isset($_POST['delete'])) {
                $numLicence = $_POST["NumLicence"];
                $res= $linkpdo->prepare('DELETE FROM joueurs WHERE NumLicence = :numLicence');
                $res->bindParam(':numLicence', $numLicence);
                if($res->execute()){
                echo "La requête a été exécutée avec succès";
                }else{
                $res->DebugDumpParams();
                echo "La requête a échouée";
                }
                }
                
            ?>
            
            </table>