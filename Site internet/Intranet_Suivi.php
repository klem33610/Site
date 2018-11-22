<?php include('Base.php'); ?>
<script src="static/JS/Search_Intranet.js"></script>
<?php date_default_timezone_set('UTC');
setlocale(LC_TIME, 'fr_FR.utf8','fra');?>

<!-- Gestion et suivi : Membres et compétences/ans, Donneurs par type (AU ou A),
calendrier des dons, Promesse et versement, Inscription par année,
Relance mails : réinscription, rappel de dons, News, reçus fiscaux -->
<?php
//< ---------------------- Paramètres BDD SQL------------------------->
$PARAM_hote='sql.free.fr'; // le chemin vers le serveur
$PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
$PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=UTF8', $PARAM_utilisateur, $PARAM_mot_passe);
$sql = 'SELECT * FROM Adherents_JS ORDER BY Nom';
$req = $bdd->query($sql);
$tableau = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();
//< ---------------------- ---------------------------------------------->

//< ---------------------- Définition des variables de date------------------------->
$Date = date("d-m-Y");
$Month = new DateTime(date("d-m-Y"));
$Month_don = $Month->format("Y-m");
$Year_Don = $Month->format("Y");
//< --------------------------------------------------------------------------------->

//< ---------------------- Création des tableaux de données------------------------->
$Timeline = [];
foreach($tableau as $i => $value){
  $DerniereMensualiteAideUrgence = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DerniereMensualiteAideUrgence']);
  $Inscription = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DateRenouvellement']);
  $Dons = $tableau[$i]['MontantAideUrgence'];
  $Nom = $tableau[$i]['Nom'] . " " . $Prenom = $tableau[$i]['Prenom'];
  for ($j = 12; $j > 0; $j--) {
    $Date = DateTime::createFromFormat('Y-m-d', $Month_don . '-01');
    $Month = $Date->modify('-'.$j.' months');
    if ($Month->format('Y-m') <= $DerniereMensualiteAideUrgence->format('Y-m') && $Month->format('Y-m') >= $Inscription->format('Y-m')) {
      $Timeline[$Month->format('Y-m')][] = array(
      "Nom" => $Nom,
      "Dons" => $Dons
    );
    }
  }
  for ($j = 0; $j <= 12; $j++) {
    $Date = DateTime::createFromFormat('Y-m-d', $Month_don . '-01');
    $Month = $Date->modify('+'.$j.' months');
    if ($Month->format('Y-m') <= $DerniereMensualiteAideUrgence->format('Y-m') && $Month->format('Y-m') >= $Inscription->format('Y-m')) {
      $Timeline[$Month->format('Y-m')][] = array(
        "Nom" => $Nom,
        "Dons" => $Dons
      );
    }
  }
}
//< --------------------------------------------------------------------------------->

?>
<body>
//< ---------------------- Fenêtre modal de suivi des versements de dons / relance mail------------------------->
  <div id="Formulaire_yes" class="modal fade text-center" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">Confirmer l'encaissement des dons suivants ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Montant</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Mail</th>
                <th scope="col">Inscription</th>
                <th scope="col">Relance mail</th>
              </tr>
            </thead>
            <tbody>
              <? foreach($tableau as $i => $value){
                  $DerniereMensualiteAideUrgence = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DerniereMensualiteAideUrgence']);
                  if ($tableau[$i]['DateValidationMensualite']){
                    $DateValidationMensualite = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DateValidationMensualite']);
                  } else {
                    $DateValidationMensualite = DateTime::createFromFormat('Y-m-d','2223-10-22');
                  }
                  if ($DateValidationMensualite->format('Y-m-d') == '2223-10-22' || ($DateValidationMensualite < $DerniereMensualiteAideUrgence && $DateValidationMensualite->format('Y-m') < $Month_don)) {
                    ?>
                    <tr id="<? echo $tableau[$i]['id'];?>" class="other_text tab_choice">
                      <td><? echo $tableau[$i]['MontantAideUrgence']; ?> euros</td>
                      <td> <? echo $tableau[$i]['Prenom']; ?></td>
                      <td><? echo $tableau[$i]['Nom']; ?></td>
                      <td id="Mail"><? echo $tableau[$i]['Mail']; ?></td>
                      <td><? echo $tableau[$i]['DateRenouvellement']; ?></td>
                      <td class="text-danger"><? echo $tableau[$i]['MailRappelDon']; ?></td>
                      <td class="d-none">
                        <textarea id="texte_mail" rows="10" class="text-left form-control">
Bonjour <?echo $tableau[$i]['Prenom'] . " " .$tableau[$i]['Nom'];?>,
Le <?echo $tableau[$i]['DateRenouvellement'];?>, vous avez rempli le formulaire de participation aux actions de l'association Jarez Solidarités. Et nous vous en remercions chaleureusement.
Nous avons enregistré votre promesse de dons de <?echo $tableau[$i]['MontantAideUrgence'];?> euros. Et à ce jour, si nous ne faisons pas d'erreur, nous ne pouvons acter la réception de ce don.
Nous nous permettons ainsi de vous envoyer ce mail de rappel.
Merci de de votre compréhension,
Fraternellement,
L'association Jarez Solidarités.
                        </textarea>
                      </td>
                    </tr>
                  <?}
              }?>
            </tbody>
          </table>
          <div id="champ_mail" class="mt-2">
            <hr/>
            <div class="form-group">
              <label for="Mail">Corps du mail</label>
              <textarea class="form-control text-left" rows="12" id="mail"></textarea>
            </div>
          </div>

        </div>
        <div id="Don_OK" class="modal-footer mx-auto text-center">
            <button type="button" onclick="maj_BDD()" class="btn btn-primary">Confirmer</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        <div id="Don_NOK" class="modal-footer mx-auto text-center">
            <button type="button" onclick="rappel_Dons()" class="btn btn-primary">Envoyer</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
      </div>
    </div>
  </div>
  //< ---------------------------------------------------------------------------------------------------------------------------->

</form>
//< ---------------------------------------Frise mensuelle des promesses de dons------------------------------------------------------------->
  <div class="form-group col-sm-12 mx-auto">
    <div class="shadow card bg-light">
      <div class="mb-2 text-center card-header rounded-bottom bg-warning text-white shadow-sm"><h3>Frise temporelle des dons pour l'aide d'urgence &rarr;</h3>
      </div>
      <div class="card-body">
        <div class="timeline">
          <div class="timeline__wrap">
            <div class="timeline__items">
              <? for ($i = 12; $i > 0; $i--) {
                $Date = DateTime::createFromFormat('Y-m-d', $Month_don . '-01');
                 $Month = $Date->modify('-'.$i.' months');
                 $dd = array_column($Timeline[$Month->format('Y-m')], 'Dons');
                 $Sum_Dons = array_sum($dd);
              ?>
                 <div class="timeline__item" data-toggle="tooltip" data-placement="top" title="<?print_r(array_column($Timeline[$Month->format('Y-m')], 'Dons', 'Nom'));?>">
                   <div class="text-center timeline__content">
                     <h2><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br></h2>
                     <p>Somme des promesses de dons :</p>
                    <p> <? echo  $Sum_Dons." ";?> euros </p>
                  </div>
                </div>
              <? } ?>
              <? for ($i = 0; $i <= 12; $i++) {
                $Date = DateTime::createFromFormat('Y-m-d', $Month_don . '-01');
                 $Month = $Date->modify('+'.$i.' months');
                 $dd = array_column($Timeline[$Month->format('Y-m')], 'Dons');
                 $Sum_Dons = array_sum($dd);
              ?>
                <div class="timeline__item" data-toggle="tooltip" data-placement="top" title="<?print_r(array_column($Timeline[$Month->format('Y-m')], 'Dons', 'Nom'));?>">
                   <div class="<? if ($i==0) {echo "border border-warning rounded ";}?> text-center timeline__content">
                     <h2><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br></h2>
                     <p>Somme des promesses de dons :</p>
                     <p> <? echo  $Sum_Dons." ";?> euros </p>
                  </div>
                </div>
              <? } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  //< ---------------------------------------------------------------------------------------------------------------------------->

  <div class="card-deck mx-auto col-sm-12">
  //< -------------------------------------------Outil de gestion des promesses de dons/relances mail------------------------------------------------------------------->
    <div class="form-group col-sm-6 mx-auto text-center my-3">
      <div id="Suivi_Dons" class="shadow card bg-light">
        <div class="card-header rounded-bottom bg-info text-white shadow-sm">
          <h5>Suivi des promesses de dons</h5>
        </div>
        <div class="card-body">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Choix</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Inscription</th>
              </tr>
            </thead>
            <tbody>
              <? foreach($tableau as $i => $value){
                  $DerniereMensualiteAideUrgence = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DerniereMensualiteAideUrgence']);
                  if ($tableau[$i]['DateValidationMensualite']){
                    $DateValidationMensualite = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DateValidationMensualite']);
                  } else {
                    $DateValidationMensualite = DateTime::createFromFormat('Y-m-d','2222-22-22');
                  }
                  if ($DateValidationMensualite->format('Y-m-d') == '2223-10-22' || ($DateValidationMensualite < $DerniereMensualiteAideUrgence && $DateValidationMensualite->format('Y-m') < $Month_don)) {
                    ?>
                    <tr>
                      <td name="<? echo $tableau[$i]['id'];?>"><input id="<? echo $tableau[$i]['id'];?>" style="width:23px; height:23px" onchange='Selection(this);' class="checkbox form-check-input mx-auto" type="checkbox"></td>
                      <td name="<? echo $tableau[$i]['MontantAideUrgence'];?>"><? echo $tableau[$i]['Prenom']; ?></td>
                      <td name="<? echo $tableau[$i]['mail'];?>"><? echo $tableau[$i]['Nom']; ?></td>
                      <td name="<? echo $tableau[$i]['DateRenouvellement'];?>"><? echo $tableau[$i]['DateRenouvellement']; ?></td>
                    </tr>
                  <?}
              }?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="mx-auto row">
            <div class="col-sm-6">
              <button id="yes" type="button" class="btn btn-lg btn-outline-success" onclick="modal_show(this)">Validation</button>
            </div>
            <div class="col-sm-6">
              <button id="no" type="button" class="btn btn-lg btn-outline-danger" onclick="modal_show(this)">Relance mail</button>
            </div>
          </div>
        </div>
      </div>
  </div>
  //< ---------------------------------------------------------------------------------------------------------------------------->

   //< -----------------------Outil de gestion des envois de documents aux adhérents / réinvitation d'inscription N+1--------------------->
    <div class="form-group col-sm-6 mx-auto text-center my-3">
      <div class="shadow card bg-light">
        <div class="card-header rounded-bottom bg-info text-white shadow-sm">
          <h5>Suivi des adhésions annuelles</h5>
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item col-sm-6">
              <a class="nav-link active text-dark" data-toggle="collapse" href="#membercard">Carte de membre et reçus fiscaux</a>
            </li>
            <li class="nav-item col-sm-6 ">
              <a class="nav-link text-dark" data-toggle="collapse" href="#renew">Renouvellement d'adhésion</a>
            </li>
          </ul>
        </div>
        <div id="membercard" class="collapse">
          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">Choix</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Inscription</th>
                </tr>
              </thead>
              <tbody>
                <? foreach($tableau as $i => $value){
                    $DateRenouvellement = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DateRenouvellement']);
                    if ($DateRenouvellement->format('Y') == $Year_Don - 1) {
                      ?>
                      <tr>
                        <td><input style="width:23px; height:23px" class="form-check-input mx-auto" type="checkbox"></td>
                        <td><? echo $tableau[$i]['Prenom']; ?></td>
                        <td><? echo $tableau[$i]['Nom']; ?></td>
                        <td><? echo $tableau[$i]['DateRenouvellement']; ?></td>
                      </tr>
                    <?}
                }?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="mx-auto text-center">
              <button type="button" class="btn btn-lg btn-outline-success">Envoyer par mail</button>
            </div>
          </div>
        </div>
        <div id="renew" class="collapse">
          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">Choix</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Inscription</th>
                </tr>
              </thead>
              <tbody>
                <? foreach($tableau as $i => $value){
                    $DateRenouvellement = DateTime::createFromFormat('Y-m-d', $tableau[$i]['DateRenouvellement']);
                    if ($DateRenouvellement->format('Y') == $Year_Don - 1) {
                      ?>
                      <tr>
                        <td><input style="width:23px; height:23px" class="form-check-input mx-auto" type="checkbox"></td>
                        <td><? echo $tableau[$i]['Prenom']; ?></td>
                        <td><? echo $tableau[$i]['Nom']; ?></td>
                        <td><? echo $tableau[$i]['DateRenouvellement']; ?></td>
                      </tr>
                    <?}
                }?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="mx-auto text-center">
              <button type="button" class="btn btn-lg btn-outline-success">Réinviter par mail</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  //< ---------------------------------------------------------------------------------------------------------------------------->

   //< ----------------------------------------Tableau de visualisation de la BDD--------------------------------------------------->
  <div class="form-group col-sm-12 mx-auto">
    <div class="mt-3 shadow card">
      <div class="text-center card-header rounded-bottom shadow-sm">
        <h3>Membres de Jarez Solidarités</h3>
      </div>
      <div class="text-center my-0 py-0 mx-0 px-0 card-body">
        <table onclick="show_Table(this)" id="Membres" class="table table-bordered table-striped">
         <thead>
           <tr class="text-center table-warning">
           <? $i = 0;
           foreach($tableau[0] as $key => $val){
             $i = $i + 1; ?>
               <th class="<? if ($i > 7){echo 'other_text';} ?>">
                 <p class="text-error" id="<? echo $key;?>" onclick="sortTable(this)"><? echo $key; ?></p>
                 <input class="form-control" type="text" onkeyup="search(this)" placeholder="Recherche" id="<? echo $key; ?>">
               </th>
            <?}?>
            </tr>
        </thead>
        <tbody>
          <tr>
          <? $x = 0;
          foreach($tableau as $i => $value){
            $x = $x + 1;
            $y = 0;
            foreach($tableau[$i] as $key => $val){
              $y = $y + 1; ?>
                <td class="<?php if($x > 4 OR $y > 7) { echo 'other_text ';} ?><? echo $key;?>"><? echo $tableau[$i][$key]; ?></td>
            <? } ?>
          </tr>
        <? } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
//< ---------------------------------------------------------------------------------------------------------------------------->


<script src="static/JS/timeline.min.js"></script>
<link href="static/css/timeline.min.css" rel="stylesheet">
<script src="static/JS/timeline.js"></script>
