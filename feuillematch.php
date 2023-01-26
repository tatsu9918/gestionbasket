<?php
        try {
         $linkpdo = new PDO("mysql:host=localhost;dbname=gestionbasket", 'root');
        } catch (Exception $e) {
         die('Error : ' . $e->getMessage());
        }
?>
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
        while ($data = $res->fetch())
?>
    while($data = $res->fetch()) {
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
        echo"<td> . $data['photo'] .  </td>
    }

        


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