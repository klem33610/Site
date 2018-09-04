<?php
date_default_timezone_set('UTC');
// Connexion à la base de données
try

{

    $bdd = new PDO('mysql:host=localhost;dbname=Adhérents JS;charset=utf8', 'root', '1Do9muL1');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Tel_Fixe = $_POST['Tel_fix'];
$Tel_Mobile = $_POST['Tel_mobile'];
$Mail = $_POST['Mail'];
$Adresse = $_POST['Adresse'];
$Adresse2 = $_POST['Adresse2'];
$Ville = $_POST['Ville'];
$CP = $_POST['CP'];
$Montant = $_POST['Montant'];
$Montant_Autre = $_POST['Montant_Autre'];
$Duree = $_POST['Duree'];
$Duree_Autre = $_POST['Duree_Autre'];
$Aide_Urgence = $_POST['Aide_Urgence'];
$Commentaire = $_POST['Commentaire'];
$Annonymat = $_POST['Anonymat'];
$Pseudo = $_POST['Pseudo'];

$id = $Nom . $Prenom . $CP;
$Date = date('l jS \of F Y h:i:s A');


// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Adhérents');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
  if (strtoupper($donnees['id']) == strtoupper($id))
  {
    $req = $bdd->prepare('UPDATE Adhérents SET Mail = :Mail WHERE id = :id');
    $req->execute(array(
	    'Mail' => $Mail,
      'id' => $id
	   ));
  } else {
  // Insertion du message à l'aide d'une requête préparée
  $req = $bdd->prepare('INSERT INTO Adhérents (id, Nom, Prenom, Mail) VALUES(?, ?, ?, ?)');

  $req->execute(array($id, $Nom, $Prenom, $Mail));
  }
}
$reponse->closeCursor(); // Termine le traitement de la requête

header('Location: ../../Form_Check.php')
?>
