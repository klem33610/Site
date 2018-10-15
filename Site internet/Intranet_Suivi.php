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

$sql = 'SELECT * FROM Adherents_JS ORDER BY id';
$req = $bdd->query($sql);

$rs = $bdd->query('SELECT * FROM Adherents_JS LIMIT 0');
?>

<body>
  <div class="form-group col-sm-12 mx-auto">
    <div class="shadow card bg-light">
      <div class="mb-2 text-center card-header px-4 rounded-bottom py-2 bg-warning text-white shadow-sm"><h3>Frise temporelle des dons pour l'aide d'urgence &rarr;</h3>
      </div>
      <div class="card-body">
        <?php include('Timeline.php'); ?>
      </div>
    </div>
  </div>
  <div class="mx-auto row col-sm-12 mb-3">
    <div class="shadow col-sm-6 card bg-light mt-3">
      <div class="card-header px-4 rounded-bottom py-2 bg-info text-white shadow-sm">Header</div>
      <div class="card-body">
        <h5 class="card-title">Light card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
    <div class="shadow card bg-light mt-3 col-sm-6">
      <div class="card-header px-4 rounded-bottom py-2 bg-info text-white shadow-sm">Header</div>
      <div class="card-body">
        <h5 class="card-title">Light card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="form-group col-sm-12 mx-auto">
    <div class="shadow card">
      <div class="text-center card-header rounded-bottom shadow-sm">
        <h3 class="text-center">Membres de Jarez Solidarités</h3>
      </div>
      <div class="card-body ml-0">
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
