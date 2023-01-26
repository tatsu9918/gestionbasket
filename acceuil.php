<?php 
try {
	 	$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
	}
	catch (Exception $e) {
	 	die('Error : ' . $e->getMessage());
	}

	//Il faudra sûrement changer l'ordre de la requête en fonction des colonnes que vous avez fait dans la BDD.
	$req = $linkpdo->prepare('SELECT * FROM users WHERE Courriel = :email AND mdp = :mdp;');

	if ($req == false) {
	 	die ('Error query');
	}

	$req2 = $req->execute(array('email' => $_POST["courriel"],
					'mdp' => $_POST["mdp"]));

	//rowCount()
 	if ($req->rowCount() > 0) {
		header('Location:http://localhost/ProjetAssoTrisomie21/accueilpostco.html');
 	}
 	else {
 		echo "Je ne vous connais pas, désolé.";
 	}

	if ($req2 == false) {
	 	die ('Error execute');
	 	$req->DebugDumpParams();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulaire de connexion</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="formulaire_connexion.php" method="POST">
			

			<h1>Se connecter</h1>

			<div class="inputs">
			 	<input type="email" required placeholder="Email" name="courriel" />
				<input type="password" required placeholder="Mot de passe" name="mdp">
			</div>
			
				
			<div align="center">
			<p class="inscription"><a href="motdepasseoublie.html">Mot de passe oublié</a></p>	
			</div>
			<div align="center">
			  <button type="submit"><a href="accueilpostco.html">Se connecter</a></button>
			</div>
	</form>
</body>
</html>