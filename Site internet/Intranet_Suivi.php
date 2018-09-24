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
<table id="Membres" class="text-center table table-bordered table-striped">
 <h3 class="text-center">Membres de Jarez Solidarités</h3>
 <thead>
 <tr class="table-warning">
    <? for ($i = 0; $i < $rs->columnCount(); $i++) {
       $col = $rs->getColumnMeta($i); ?>
       <th><p class="text-error" id="<? echo $col['name'];?>" onclick="sortTable(this)"><? echo $col['name']; ?></p><input class="form-control" type="text" id="<? echo $col['name'];?>" onkeyup="search(this)" placeholder="Recherche"></th>
<? } ?>
</tr>
</thead>
<tbody>
  <tr>
    <? for ($j = 0; $j < $req->rowCount(); $j++) {
      $row = $req->fetch($j);
       for ($i = 0; $i < $rs->columnCount(); $i++) {
         $col = $rs->getColumnMeta($i); ?>
      <td class="<? echo $col['name'];?>"><? echo $row[$col['name']]; ?></td>
 <? } ?>
 </tr>
<? }
 $req->closeCursor();
 $rs->closeCursor();
  ?>
  </tbody>
</table>
</body>
