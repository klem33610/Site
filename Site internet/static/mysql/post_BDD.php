<?php
date_default_timezone_set('UTC');
// Connexion à la base de données
$PARAM_hote='sql.free.fr'; // le chemin vers le serveur
$PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
$PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=UTF8', $PARAM_utilisateur, $PARAM_mot_passe);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*INITIALISATION*/
echo "<pre>";
print_r($_POST);
echo "</pre>";

$values = [];
$id = $_POST['Nom'] . $_POST['Prenom'] . $_POST['CodePostal'];
$Date = new DateTime(date("d-m-Y"));
$Month = new DateTime(date("d-m-Y"));

if ($_POST['Autre_Date']) {
  $Duree = DateTime::createFromFormat('m/Y', $_POST['Autre_Date']);
} else {
  $Duree = $Month->modify('+'.$_POST['DerniereMensualiteAideUrgence'].' months');
}
$Duree = $Duree->format("Y-m-d");
$Dons = 'oui';

foreach($_POST as $paramName => $paramValue){
  if ($paramValue) {
    $values[$paramName] = $paramValue;
  }
}
$values['id'] = preg_replace('/\s+/', '', $id);
if (!$_POST['MontantAideUrgenceChoice']){
  $values['MontantAideUrgence'] = $_POST['MontantAideUrgence'];
} else {
  $values['MontantAideUrgence'] = $_POST['MontantAideUrgenceChoice'];
}
$values['DateInscription'] = $Date->format("Y-m-d");
$values['DateRenouvellement'] = $Date->format("Y-m-d");
$values['DerniereMensualiteAideUrgence'] = $Duree;
$values['DonsMensuels'] = $Dons;
$values['MembreAU'] = true;
unset($values[Autre_Date]);
unset($values[MontantAideUrgenceChoice]);

// $tmp_query = ("INSERT INTO user (id, nom) VALUES (:DateInscription, :Adresse2) ");
// $tmp_result = $bdd->prepare($tmp_query);
// $tmp_result->bindValue(':Adresse2', $_POST['Adresse2']);
// $tmp_result->bindValue(':DateInscription', $Date);
// echo '<pre>'.print_r($tmp_result,true).'</pre>';
// $tmp_result->execute();
echo "<pre>";
print_r($values);
echo "</pre>";

    //Liste des champs & value
    $tmp_fields = '';
    $tmp_value = '';
    //on parcourt le tableau contenant ce qui à été posté
    $keys = array_keys( $values );
    $l = count( $values ) - 1;
    for ( $i = 0; $i <= $l; $i++ ) {
      $key = $keys[$i];
      $val = $values[$key];
      if(!empty($val)){
        if ($i < $l){
          $tmp_fields .= $key.', ';
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$key.', ';
        } else if ($i == $l){
          $tmp_fields .= $key;
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$key;
        }
      }
    }

    $tmp_query = ("INSERT INTO Adherents_JS ($tmp_fields) VALUES ($tmp_value) ON DUPLICATE KEY UPDATE
      Prenom = IF(VALUES(Prenom) IS NOT NULL, VALUES(Prenom))
    ");
    //le tmp_query affichera "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)"

    //Préparation de la requête
    $tmp_result = $bdd->prepare($tmp_query);

    foreach($values as $paramName => $paramValue){
      $tmp_result->bindValue($paramName, $paramValue);
  }

     if($tmp_result->execute()){
        echo "Succes";
    }else{
        echo "une erreur est survenue lors de l'insertion";
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
    $tmp_result->closeCursor(); // Termine le traitement de la requête

// $sql = 'SELECT COUNT(*) AS nb FROM Adherents_JS';
// $result = $bdd->query($sql);
//
// // On affiche chaque entrée une à une
// if ($result > 0)
// {
//   $reponse = $bdd->query('SELECT * FROM Adherents_JS');
//   $reponse->execute();
//   while ($donnees = $reponse->fetch())
//   {
//     if (strtoupper($donnees['id']) == strtoupper($id))
//     {
//       $req = $bdd->prepare('UPDATE Adherents_JS SET Mail = :Mail WHERE id = :id');
//       $req->execute(array(
//   	    'Mail' => $Mail,
//         'id' => $id
//   	   ));
//      }
//    }
//    $reponse->closeCursor(); // Termine le traitement de la requête
//   } else {
//   // Insertion du message à l'aide d'une requête préparée
//   $req = $bdd->prepare('INSERT INTO Adherents_JS(id, Nom, Prenom, Mail, TelMobile, TelFixe, Adresse, Adresse2, Ville, CodePostal, DonsMensuels, MontantAideUrgence, DureeAideUrgence, Competence, Commentaire, Pseudo, DateInscription) VALUES($id, $Nom, $Prenom, $Mail, $Tel_Mobile, $Tel_Fixe, $Adresse, $Adresse2, $Ville, $CP, $Dons_Mensuels, $Montant, $Duree, null, $Commentaire, $Pseudo, $Date)');
//   $req->execute();
//  }
?>
