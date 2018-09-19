<?php
date_default_timezone_set('UTC');
// Connexion à la base de données
/*CONNEXION*/
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

//On insert les donné des post dans un tableau pour la fonction ci dessous
$id = $_POST['Nom'] . $_POST['Prenom'] . $_POST['CP'];
$Date = date('l jS \of F Y h:i:s A');
if ($_POST['Montant_Autre']) {
  $Montant = $_POST['Montant_Autre'];
} else {
  $Montant = $_POST['Montant'];
}
if ($_POST['Duree_Autre']) {
  $Duree = $_POST['Duree_Autre'];
} else {
  $Duree = $_POST['Duree'];
}
$Dons = '1';

$values = [
  'id' => $id,
  'Nom' => $_POST['Nom'],
  'Prenom' => $_POST['Prenom'],
  'Mail' => $_POST['Mail'],
  'TelMobile' => $_POST['Tel_mobile'],
  'TelFixe' => $_POST['Tel_fix'],
  'Adresse' => $_POST['Adresse'],
  'Adresse2' => $_POST['Adresse2'],
  'Ville' => $_POST['Ville'],
  'CodePostal' => $_POST['CP'],
  'DonsMensuels' => $Dons,
  'MontantAideUrgence' => $Montant,
  'DureeAideUrgence' => $Duree,
  'Competence' => "bdsbdd",
  // $Aide_Urgence => $_POST['Aide_Urgence'],
  'Commentaire' => $_POST['Commentaire'],
  // $Annonymat => $_POST['Anonymat'],
  'Pseudo' => $_POST['Pseudo'],
  'DateInscription' => $Date
];
$Number = count($values);
$tmp_query = ("INSERT INTO user (Nom, id) VALUES (:Adresse2, :DateInscription) ");
$tmp_result = $bdd->prepare($tmp_query);
$tmp_result->bindValue(':Adresse2', $_POST['Adresse2']);
$tmp_result->bindValue(':DateInscription', $Date);
$tmp_result->execute();
echo "<pre>";
print_r($values);
echo "</pre>";
//On initialise des erreurs
$errors = [];

/*CONDITIONS*/
// //Si le username est vide ou qu'il contient des charactère spéciaux
// if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
//     $errors['username'] = "votre pseudo n'est pas valide (Alphanumérique)";
// }
// //Si l'adresse mail est vide ou invalide
// if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
//     $errors['email'] = "Votre email n'est pas valide";
// }
// //Si le mot de passe est vide ou différent l'un l'autre
// if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
//     $errors['password'] = "Vous devez rentrer un mot de passe valide";
// }

//Si aucune erreur n'et detecté
if(empty($errors)){

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
        echo $i;
        echo $l;
        if ($i < $l){
          $tmp_fields .= $key.', ';
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$val.', ';
        } else if ($i == $l){
          $tmp_fields .= $key;
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$val;
        }
      }
    }
    // foreach($values as $paramName => $paramValue){
    //     //Si le champ n'est pas vide
    //     if(!empty($paramValue)){
    //         //tmp_field donnera un string: "username email password"
    //         $tmp_fields .= $paramName;
    //         //tmp_value donnera un string: ":username :email :password"
    //         $tmp_value .= ':'.$paramValue;
    //     }
    // }

    //On insert les virgule entre charque mot "username, email, password"
    // $tmp_fields = rtrim($tmp_fields,', ');
    // $tmp_value = rtrim($tmp_value,', ');

    $tmp_query = ("INSERT INTO Adherents_JS ($tmp_fields) VALUES ($tmp_value) ");
    //le tmp_query affichera "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)"
    echo "<pre>";
    print_r($tmp_query);
    echo "</pre>";

    //Préparation de la requête
    $tmp_result = $bdd->prepare($tmp_query);

    foreach($values as $paramName => $paramValue){
        //Si le champ n'est pas vide
            //tmp_field donnera un string: "username email password"
    $tmp_result->bindValue(':'.$paramName, $paramValue);
  }

    // //Personnaliser chaque champ avec les valeurs
    // foreach($values as $paramName => $paramValue){
    //     //Si le champ n'est pas le premier (id), qui est un n° Auto
    //     if(!($paramName == 'id')){
    //         //Si le champ n'est pas vide
    //         if(!empty($paramValue)){
    //             //si le champs est un integer
    //             if(is_int($paramValue))
    //                 $param = PDO::PARAM_INT;
    //             //si le champs est un boolean
    //             elseif(is_bool($paramValue))
    //                 $param = PDO::PARAM_BOOL;
    //             //si le champs est un NULL
    //             elseif(is_null($paramValue))
    //                 $param = PDO::PARAM_NULL;
    //             //si le champs est un string
    //             elseif(is_string($paramValue))
    //                 $param = PDO::PARAM_STR;
    //             //sinon
    //             else
    //                 $param = FALSE;
    //
    //             //Associe une VALEUR à ce CHAMP
    //             //ex: username donnera: $tmp_result->bindValue(':username', "Joe", PDO::PARAM_STR);
    //             $tmp_result->bindValue(':'.$paramName, $paramValue, $param);
    //             echo "':'.$paramName, $paramValue, $param";
    //         }
    //     }
    // }
     if($tmp_result->execute()){
        echo "Succes";
    }else{
        echo "une erreur est survenue lors de l'insertion";
    }
}
//Si au moins une erreurs est detecté ont affiche les erreurs
else{
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
}

//
// try
//   {
//
//     // Connexion à la base de données
//     $PARAM_hote='sql.free.fr'; // le chemin vers le serveur
//     $PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
//     $PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
//     $PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
//     $bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
//
//   }
//
// catch(Exception $e)
//
//   {
//
//         die('Erreur : '.$e->getMessage());
//
//       }
// $Nom = $_POST['Nom'];
// $Prenom = $_POST['Prenom'];
// $Tel_Fixe = $_POST['Tel_fix'];
// $Tel_Mobile = $_POST['Tel_mobile'];
// $Mail = $_POST['Mail'];
// $Adresse = $_POST['Adresse'];
// $Adresse2 = $_POST['Adresse2'];
// $Ville = $_POST['Ville'];
// $CP = $_POST['CP'];
// $Montant = $_POST['Montant'];
// $Montant_Autre = $_POST['Montant_Autre'];
// $Duree = $_POST['Duree'];
// $Duree_Autre = $_POST['Duree_Autre'];
// $Aide_Urgence = $_POST['Aide_Urgence'];
// $Commentaire = $_POST['Commentaire'];
// $Annonymat = $_POST['Anonymat'];
// $Pseudo = $_POST['Pseudo'];
// $Dons_Mensuels = '1';
//
// $id = $Nom . $Prenom . $CP;
// $Date = date('l jS \of F Y h:i:s A');
//
//
//
//
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
<!-- Tables  : Adhérents, Membres actifs, Aide_urgence et periode(1er versement - dernier versement), Dons, Dons_mensuels-->
<!-- Gestion et suivi : Membres et compétences/ans, Donneurs par type (AU ou A),
calendrier des dons, Promesse et versement, Inscription par année,
Relance mails : réinscription, rappel de dons, News, reçus fiscaux -->
