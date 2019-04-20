<?php
date_default_timezone_set('UTC');
setlocale(LC_TIME, 'fr_FR.utf8','fra');
// Connexion à la base de données
$PARAM_hote='sql.free.fr'; // le chemin vers le serveur
$PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
$PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=UTF8', $PARAM_utilisateur, $PARAM_mot_passe);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$csv = array();

// check there are no errors
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $type = $_FILES['csv']['type'];
    $tmpName = $_FILES['csv']['tmp_name'];

    // check the file is a csv
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 0, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);
                for ( $i = 0; $i <= $col_count; $i++ ) {
                    // get the values from the csv
                    $csv[$row][$i] = $data[$i];
                    $csv[$row][$i] = $data[$i];
                }
                // inc the row
                $row++;
            }
            fclose($handle);
        }
    }
}
foreach ($csv[0] as $i => $value) {
    if (($value) == 'Nom'){
        $col_Nom = $i;
    }
    if (($value) == 'Prénom'){
        $csv[0][$i] = 'Prenom';
        $col_Prenom = $i;
    }
    if (($value) == 'Tél portable'){
        $csv[0][$i] = 'TelMobile';
    }
    if (($value) == 'Tél fixe'){
        $csv[0][$i] = 'TelFixe';
    }
    if (($value) == 'Commune'){
        $csv[0][$i] = 'Ville';
    }
    if (($value) == 'Adresse courriel'){
        $csv[0][$i] = 'Mail';
    }
    if (($value) == 'Code postal'){
        $csv[0][$i] = 'CodePostal';
        $col_CodePostal = $i;
    }
    if (($value) == "Dons \"Aide d'urgence\""){
        $csv[0][$i] = 'DonsMensuels';
    }
    if (($value) == "Quel montant ?"){
        $csv[0][$i] = 'MontantAideUrgence';
    }
    if (($value) == "Je souhaite faire un commentaire"){
        $csv[0][$i] = 'Commentaire';
    }
    if (($value) == "Mon pseudo"){
        $csv[0][$i] = 'Pseudo';
    }
    if (($value) == "Horodateur"){
        $csv[0][$i] = 'DateInscription';
        $col_DateInscription = $i;
    }
    if (($value) == "Confirmation adhésion + Carte membre envoyée le"){
        $csv[0][$i] = 'DateEnvoiCarteMembre';
    }
    if (($value) == "Membre actif"){
        $csv[0][$i] = 'MembreAU';
    }
    if (($value) == "Abandon frais"){
        $csv[0][$i] = 'Abandonfrais';
    }
    if (($value) == "Inscription Liste Diffusion Bénévoles-Sympathisants"){
        $csv[0][$i] = 'Listedediffusion';
    }
    if (($value) == "Je règle par"){
        $csv[0][$i] = 'Modedereglement';
    }
    if (($value) == "La macro prend en compte les donnés des colonnes beige pour générer les reçus fiscaux"){
        $csv[0][$i] = '';
    }
}
array_unshift($csv[0],'id');
$j = count($csv[0]);
$l = count($csv);
for ( $i = 1; $i <= $l; $i++ ) {
    $tmp_fields = '';
    $tmp_value = '';
    $values = [];
    array_unshift($csv[$i],$csv[$i][$col_Nom].$csv[$i][$col_Prenom].$csv[$i][$col_CodePostal]);
    for ( $k = 0; $k <= $j; $k++ ) {
        $key = $csv[0][$k];
        $val = $csv[$i][$k];
        if(!empty($val)){
            if($k == 1){
                echo extractDates($val);
                $val = DateTime::createFromFormat('d/m/Y',extractDates($val));
                $val = $val->format('Y-m-d');
            }
            $values[$key] = $val;
        }
    }
    $keys = array_keys( $values );
    $x = count( $values ) - 1;
    for ( $y = 0; $y <= $x; $y++ ) {
      $key = $keys[$y];
      $val = $values[$key];
      if(!empty($val)){
        if ($y < $x){
          $tmp_fields .= $key.', ';
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$key.', ';
        } else if ($y == $x){
          $tmp_fields .= $key;
          //tmp_value donnera un string: ":username :email :password"
          $tmp_value .= ':'.$key;
        }
      }
    }
    echo "<pre>";
        print_r($values);
        echo "</pre>";
        echo $tmp_value;
    $tmp_query = ("INSERT INTO Adherents_JS ($tmp_fields) VALUES ($tmp_value) ON DUPLICATE KEY UPDATE 
        id = VALUES(id),
        DateInscription = VALUES(DateInscription)
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
}

// $fields=array_keys($values); // here you have to trust your field names! 
// $values=array_values($values);
// echo $values;
// $fieldlist=implode(',',$fields); 
// $qs=(str_repeat("?,",count($fields)-1)).'?';
// echo count($fields);
// echo $qs;
// $sql="insert into user($fieldlist) values($qs)";
// $q=$bdd->prepare($sql);
// $q->execute($values);
// //le tmp_query affichera "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)"

   //on parcourt le tableau contenant ce qui à été posté
   function extractDates($mydate)
   {
       $date = explode(" ", $mydate);
       $output = $date[0];
       if ($date[0] == "Date:" || $date[0] == "date:")
       {
           $output = $date[1];
       }
       $output = str_replace("-","/",$output);
       return $output;
   }
?>