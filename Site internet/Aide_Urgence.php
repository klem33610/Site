<?php include('Base.php'); ?>
<div id="Formulaire_yes" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Validation du formulaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Vos données sont correctement enregistrée. Merci de votre participation</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<body style="color:grey">
  <div class="text-center mt-2" style="font-family: Arial; color: rgb(204, 153, 51)">
    <h4 class="font-weight-bold">PROGRAMME <span>
      <a href="../jarez-solidarites.html"><img style="height: 100px;" alt="Logo Jarez Solidarités" src="static/media/logoJS.jpg"></img></a>
    </span>AIDE D'URGENCE</h4>
  </div>
  <div class="row col-sm-12 mt-2">
    <div class="col-sm-3">
      <h4 class="text-center">Le projet humanitaire</h4>
      <ul>
        <li class="font-weight-bold">Pour qui ?</li>
        <ul>
          <li>Personnes en difficulté, notamment à la rue</li>
          <li>Trois familles hébergées temporairement par des bénévoles</li>
        </ul>
        <li class="font-weight-bold">Pour quoi ?</li>
        <ul>
          <li>Mises à disposition de logements, fourniture de nourriture et produits de 1ère nécessité</li>
        </ul>
        <li class="font-weight-bold">Comment ?</li>
        <ul>
          <li>Financement par dons solidaires mensuels réguliers</li>
        </ul>
      </ul>
    </div>
    <?php include('Formulaire_AU.php'); ?>
    <div class="col-sm-3">
      <h4 class="text-center">Avancement au 25 août</h4>
      <ul>
        <li>Un grand <span class="font-weight-bold">MERCI</span> aux 37 personnes qui ont effectué leurs 1ers versements mensuels. Ils s'élevent à :</li>
        <ul>
          <li>565 € / mois pour le mois de juillet</li>
          <li>445 € / mois pour le mois d'août</li>
        </ul>
        <li>Reste à recevoir les versements de 9 personnes qui avaient exprimé leur intention</li>
        <li>Et bien sûr, <span class="font-weight-bold">tout le monde</span> peut participer en remplissant le formulaire ci-dessous !</li>
        <ul>
          <li>Tout excédent après paiement du loyer et charges sera affecté à ce projet !</li>
        </ul>
        <li>Les formalités de mise à disposition de 3 appartements à St-Etienne s'achèvent et les 3 familles doivent s'installer le 1er septembre</li>
      </ul>
    </div>
  </div>
</body>
<hr>
<?php include('Footer.php'); ?>
