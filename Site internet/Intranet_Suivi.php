<?php include('Base.php'); ?>
<script src="static/JS/Search_Intranet.js"></script>


<!-- Gestion et suivi : Membres et compétences/ans, Donneurs par type (AU ou A),
calendrier des dons, Promesse et versement, Inscription par année,
Relance mails : réinscription, rappel de dons, News, reçus fiscaux -->
<?php
$PARAM_hote='sql.free.fr'; // le chemin vers le serveur
$PARAM_nom_bd='jarezsolidarites'; // le nom de votre base de données
$PARAM_utilisateur='jarezsolidarites'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='J9s9o4s1'; // mot de passe de l'utilisateur pour se connecter
$bdd = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd.';charset=UTF8', $PARAM_utilisateur, $PARAM_mot_passe);

$Date = date("d-m-Y");
$Month = new DateTime(date("d-m-Y"));
$Month = $Month->format("m/Y");

$sql = 'SELECT * FROM Adherents_JS ORDER BY Nom';
$req = $bdd->query($sql);
$tableau = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();?>

// $suivi_dons = "SELECT id, Prenom, Nom, DateInscription FROM Adherents_JS WHERE DateValidationMensualite IS NULL OR (DateValidationMensualite < DerniereMensualiteAideUrgence AND DateValidationMensualite < '$Month') ORDER BY DateInscription";
// $suivi_dons = $bdd->query($suivi_dons);

<body>
  <div class="form-group col-sm-12 mx-auto">
    <div class="shadow card bg-light">
      <div class="mb-2 text-center card-header rounded-bottom bg-warning text-white shadow-sm"><h3>Frise temporelle des dons pour l'aide d'urgence &rarr;</h3>
      </div>
      <div class="card-body">
        <?php include('Timeline.php'); ?>
      </div>
    </div>
  </div>

  <div class="card-deck mx-auto col-sm-12">
    <div class="form-group col-sm-6 mx-auto text-center my-3">
      <div class="shadow card bg-light">
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
              <? foreach($tableau as $i => $value){?>
                <tr>
                  <td><input style="width:23px; height:23px; margin-left:33px" class="form-check-input mt-0" type="checkbox"></td>
                  <td><? echo $tableau[$i]['Prenom']; ?></td>
                  <td><? echo $tableau[$i]['Nom']; ?></td>
                  <td><? echo $tableau[$i]['DateInscription']; ?></td>
                </tr>
              <?}?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="mx-auto row">
            <div class="col-sm-6">
              <button type="button" class="btn btn-lg btn-outline-success">Validation</button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-lg btn-outline-danger">Relance mail</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group col-sm-6 mx-auto text-center my-3">
      <div class="shadow card bg-light">
        <div class="card-header rounded-bottom bg-info text-white shadow-sm">
          <h5>Suivi des adhésions annuelles</h5>
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
              <? foreach($tableau as $i => $value){?>
                <tr>
                  <td><input style="width:23px; height:23px; margin-left:33px" class="form-check-input mt-0" type="checkbox"></td>
                  <td><? echo $tableau[$i]['Prenom']; ?></td>
                  <td><? echo $tableau[$i]['Nom']; ?></td>
                  <td><? echo $tableau[$i]['DateInscription']; ?></td>
                </tr>
              <?}?>
            </tbody>
          </table></div>
        <div class="card-footer">
          <div class="mx-auto text-center">
            <button type="button" class="btn btn-lg btn-outline-success">Réinviter par mail</button>
          </div>
        </div>
      </div>
    </div>
  </div>
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
<?
?>
