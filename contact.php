<?php

$bdd = new PDO('mysql:host=127.0.0.1; dbname=jant','id', 'passeword');

if (isset($_POST['submit']) ) {
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['sujet']);
		$email = htmlspecialchars($_POST['email']);

	if (!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['sujet']) AND !empty($_POST['message'])) {

				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$insertmbr = $bdd->prepare("INSERT INTO employes(pseudo, sujet, email, message), VALUES(?,?,?,?)");
						$insertmbr->execute(array($nom, $sujet, $email, $message));      
						$erreur = "Votre message a bien été envoyé.";
					}
				else
					$erreur = "Votre adresse mail n'est pas valide.";
	}
	else
		$erreur = "Merci de remplir tout les champs.";
}

?>