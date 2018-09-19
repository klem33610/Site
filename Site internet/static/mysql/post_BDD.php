<?php
date_default_timezone_set('UTC');
// Connexion à la base de données
try
  {

    $bdd = new PDO('mysql:host=sql.free.fr;dbname=jarezsolidarites;charset=utf8', 'jarezsolidarites', 'J9s9o4s1');

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

if ($Montant_Autre){
  $Montant = $Montant_Autre;
}
if ($Duree_Autre){
  $Duree = $Duree_Autre;
}
$Dons_Mensuels = 1;
$id = $Nom . $Prenom . $CP;
$Date = date('l jS \of F Y h:i:s A');

$req = $bdd->prepare('INSERT INTO Adhérents JS(id, Nom, Prénom, Mail, Tel mobile, Tel fixe, Adresse, Adresse2, Ville, Code postal, Dons mensuels, Montant_Aide_Urgence, Durée_Aide_Urgence, Compétence, Commentaire, Pseudo, Date inscription) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($id, $Nom, $Prenom, $Mail, $Tel_Mobile, $Tel_Fixe, $Adresse, $Adresse2, $Ville, $CP, $Dons_Mensuels, $Montant, $Duree, null, $Commentaire, $Pseudo, $Date));
echo "<script>console.log($req)</script>";


$sql = 'SELECT COUNT(*) AS nb FROM Adhérents JS';
$result = $bdd->query($sql);
echo "<script>console.log($result)</script>";

// On affiche chaque entrée une à une
if ($result > 0)
{
  echo "<script>console.log('culé')</script>";
  $reponse = $bdd->query('SELECT * FROM Adhérents JS');
  $reponse->execute();
  while ($donnees = $reponse->fetch())
  {
    if (strtoupper($donnees['id']) == strtoupper($id))
    {
      $req = $bdd->prepare('UPDATE Adhérents SET Mail = :Mail WHERE id = :id');
      $req->execute(array(
  	    'Mail' => $Mail,
        'id' => $id
  	   ));
     }
   }
   $reponse->closeCursor(); // Termine le traitement de la requête
  } else {
    echo "<script>console.log('OK')</script>";
  // Insertion du message à l'aide d'une requête préparée
  $req = $bdd->prepare('INSERT INTO Adhérents JS(id, Nom, Prénom, Mail, Tel mobile, Tel fixe, Adresse, Adresse2, Ville, Code postal, Dons mensuels, Montant_Aide_Urgence, Durée_Aide_Urgence, Compétence, Commentaire, Pseudo, Date inscription) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $req->execute(array($id, $Nom, $Prenom, $Mail, $Tel_Mobile, $Tel_Fixe, $Adresse, $Adresse2, $Ville, $CP, $Dons_Mensuels, $Montant, $Duree, null, $Commentaire, $Pseudo, $Date));
  }
?>
<!-- Tables  : Adhérents, Membres actifs, Aide_urgence et periode(1er versement - dernier versement), Dons, Dons_mensuels-->
