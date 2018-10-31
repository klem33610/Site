<?php
date_default_timezone_set('UTC');
// Connexion à la base de données
$PARAM_hote='sql.free.fr'; // le chemin vers le serveur
$PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
$PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=UTF8', $PARAM_utilisateur, $PARAM_mot_passe);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$Date = new DateTime(date("d-m-Y"));
$Month = $Date->format('Y-m-d');
/*INITIALISATION*/
echo "<pre>";
print_r($_POST);
echo "</pre>";

$sql = "UPDATE Adherents_JS set DateValidationMensualite = :Month WHERE id = :id";
$stmt = $bdd->prepare($sql);
$stmt->bindParam(':Month', $Month);
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();
