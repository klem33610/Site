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

$sql = 'SELECT * FROM Adherents_JS ORDER BY id';
$req = $bdd->query($sql);

$rs = $bdd->query('SELECT * FROM Adherents_JS LIMIT 0');

$tableau = $req->fetchAll();
$suivi_dons = "SELECT id, Prenom, Nom, DateInscription FROM Adherents_JS WHERE DateValidationMensualite IS NULL OR (DateValidationMensualite < DerniereMensualiteAideUrgence AND DateValidationMensualite < '$Month') ORDER BY DateInscription";
$suivi_dons = $bdd->query($suivi_dons);

?>

<body>
  <?
  foreach($tableau as $i => $value)
    foreach($tableau[$i] as $key => $val)
{
  echo "<pre>";
  print_r($tableau[$i][0]);
  echo "</pre>";
}

  ?>
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
              <? for ($j = 0; $j < $suivi_dons->rowCount(); $j++) {
                $row = $suivi_dons->fetch($j);?>
                  <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td><? echo $row[1]; ?></td>
                    <td><? echo $row[2]; ?></td>
                    <td><? echo $row[3]; ?></td>
                  </tr>
            <?  }
            $suivi_dons->closeCursor();?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="mx-auto row">
            <div class="col-sm-6">
              <button type="button" class="btn btn-outline-success">Validation</button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-outline-danger">Relance mail</button>
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
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Choix</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Inscription</th>
              </tr>
            </thead>
            <tbody>
              <tr>

              </tr>
            </tbody>
          </table></div>
        <div class="card-footer">
          <div class="mx-auto row">
            <div class="col-sm-6">
              <button type="button" class="btn btn-outline-success">Validation</button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-outline-danger">Réinviter par mail</button>
            </div>
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
            <? for ($i = 0; $i < 5; $i++) {
               $col = $rs->getColumnMeta($i); ?>
               <th><p class="text-error" id="<? echo $col['name'];?>" onclick="sortTable(this)"><? echo $col['name']; ?></p><input class="form-control" type="text" id="<? echo $col['name'];?>" onkeyup="search(this)" placeholder="Recherche"></th>
        <? } ?>
        <? for ($i = 5; $i < $rs->columnCount(); $i++) {
           $col = $rs->getColumnMeta($i); ?>
           <th class="other_text"><p class="text-error" id="<? echo $col['name'];?>" onclick="sortTable(this)"><? echo $col['name']; ?></p><input class="form-control" type="text" id="<? echo $col['name'];?>" onkeyup="search(this)" placeholder="Recherche"></th>
        <? } ?>
        </tr>
        </thead>
        <tbody>
          <tr>
            <? for ($j = 0; $j < $req->rowCount(); $j++) {
              $row = $req->fetch($j);
               for ($i = 0; $i < $rs->columnCount(); $i++) {
                 $col = $rs->getColumnMeta($i); ?>
              <td class="<?php if($i > 4 OR $j > 4) { echo 'other_text ';} ?><? echo $col['name'];?>"><? echo $row[$col['name']]; ?></td>
         <? } ?>
        </tr>
        <? }
         $req->closeCursor();
         $rs->closeCursor();
          ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
</body>
<?
?>
