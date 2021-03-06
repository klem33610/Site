<div class="col-sm-6">
  <h5 class="text-center">FORMULAIRE POUR ENGAGER UN VERSEMENT MENSUEL</h5>
  <form method="post" class="border border-warning rounded" onsubmit="return verif()" action="static/mysql/post_BDD.php" style="padding : 20px 20px">
    <h4 class="text-center font-weight-bold">Versement mensuel "Aide d'urgence"</h4>
    <p><small>Vous pouvez concrétiser votre engagement en remplissant le présent formulaire et en programmant un versement mensuel avec le RIB qui est ici : <br>
      <a href="http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf">http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf</a><br>
      - Soit en ligne depuis votre espace bancaire<br>
      - Soit en passant à votre agence<br>
      Si difficulté : Jacques Thizy, trésorier 06 40 89 46 02<br>
      Ou bien, remplir le présent formulaire et lui envoyer un chèque au nom de Jarez Solidarités pour x mois au 624 Ch de la Thiollière 42320 Saint-Christo-en-Jarez
      <br><br>Avec nos remerciements Solidaires et fraternels !</small></p>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Prenom">Prenom</label>
          <input id="Prenom" type="text" class="form-control" name="Prenom" placeholder="Prenom" required>
        </div>
        <div class="form-group col-md-6">
          <label for="Nom">Nom</label>
          <input id="Nom" type="Nom" class="form-control" name="Nom" placeholder="Nom" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tel-fix" class="form-label">Telephone Fixe</label>
          <input class="form-control" type="tel" placeholder="05...." name="TelFixe">
        </div>
        <div class="form-group col-md-6">
          <label for="tel-mobile" class="form-label">Telephone Portable</label>
          <input class="form-control" type="tel" placeholder="06...." name="TelMobile">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="example-email-input" class="col-form-label">Email (mettre 0 si pas de mail)</label>
          <input class="form-control" type="text" placeholder="exemple@example.com" name="Mail" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Addresse</label>
        <input type="text" class="form-control" name="Adresse" placeholder="N° et rue">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Addresse 2</label>
        <input type="text" class="form-control" name="Adresse2" placeholder="Bâtiment, Appartement, étage,...">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Ville</label>
          <input type="text" class="form-control" name="Ville">
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">Code Postal</label>
          <input type="text" name="CodePostal" class="form-control"required>
        </div>
      </div>
      <hr>
      <div class="mt-3 form-group border border-info rounded-top col-sm-8 bg-info">
        <h5 style="color:white">Je m'engage à verser régulièrement</h5>
      </div>
      <div class="text-center">
        NOTA : les dons pour ce projet ouvrent droit à réduction d'impôts sur le revenu de 66% Si vous êtes imposable et si vous versez 100€, il ne vous en coûtera que 34€
      </div>
      <div class="form mt-3">
        <div class="form-group">
          <h5 class="font-weight-bold">Quel montant mensuel ? <span style="color : red">*</span></h5>
          <h9>Si vous l'avez oublié, contacter jarezsolidarites@free .fr</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="5" name="MontantAideUrgence" id="Montant_Choice" required> 5
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="10" name="MontantAideUrgence" id="Montant_Choice"> 10
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="20" name="MontantAideUrgence" id="Montant_Choice"> 20
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="50" name="MontantAideUrgence" id="Montant_Choice"> 50
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="100" name="MontantAideUrgence" id="Montant_Choice"> 100
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
              <input onfocus="reveal_other(this)" class="other form-check-input" type="radio" id="Montant_Choice"> Autre
              <input type="text" class="other_text form-control" id="Montant_Autre" name="MontantAideUrgenceChoice" placeholder="Autre montant">
            </label>
          </div>
        </div>
      </div>
      <div class="form mt-3">
        <div class="form-group">
          <h5 class ="font-weight-bold">Pendant quelle durée ? <span style="color : red">*</span></h5>
          <h9>Si vous l'avez oublié, contacter jarezsolidarites@free .fr</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="6" name="DerniereMensualiteAideUrgence" id="Duree" required> 6 mois
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="12" name="DerniereMensualiteAideUrgence" id="Duree"> 1 an
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="24" name="DerniereMensualiteAideUrgence" id="Duree"> 2 ans
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
                <input onfocus="reveal_other(this)" name="DerniereMensualiteAideUrgence" class="form-check-input" type="radio" id="Duree"> Autre
                <div class="other_text input-group date" id="DateIncident" data-target-input="nearest">
                    <input placeholder="Dernière mensualité" data-toggle="datetimepicker" name="Autre_Date" class="form-control datetimepicker-input" id="Date" type="text" data-target="#DateIncident">
                    <div class="input-group-append" data-target="#DateIncident" >
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="mt-3 form-group border border-info rounded-top col-sm-6 bg-info">
        <h5 class="font-weight-bold" style="color:white">Envie de faire plus ?...</h5>
      </div>
      <div class="text-center">
        Rejoignez la Commission “Aide d’urgence” !
        Vous pourrez ainsi créer des liens humains (visites, accompagnement, soutien moral...) et participer concrètement à la gestion de cette action (location et aides).
      </div>
      <div class="form mt-4">
        <div class="form-group">
          <h5 class="font-weight-bold">Je rejoins la Commission "Aide d'urgence" <span style="color : red">*</span></h5>
          <h9>et je contacte Florence 06 60 37 48 66</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="oui" name="AideUrgence" id="Aide_Urgence" required> Oui
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" value="non" name="AideUrgence" id="Aide_Urgence"> Non
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="form mt-4">
        <div class="form-group">
          <h5 class="font-weight-bold">Je souhaite faire un commentaire ou apporter une précision</h5>
          <textarea type="text" class="form-control" name="Commentaire" placeholder="Votre réponse"></textarea>
        </div>
      </div>
      <p class="text-center">Les informations recueillies sur ce formulaire sont destinées exclusivement à vous tenir informé(e). Conformément à la loi n° 78-17 du 6 janvier 1978 modifiée, vous disposez d’un droit d’accès, de modification, de rectification et de suppression des données vous concernant. Pour exercer ce droit veuillez écrire à jarezsolidarites@free .fr. Merci !</p>
      <div class="form-group mt-3">
        <div class="form-check form-check-inline">
          <label class="form-check-label font-weight-bold">
            <input class="form-check-input" type="radio" name="Anonymat" id="Duree1" value="non" required> J'accepte que mes Nom et Prenom figurent sur notre site Web
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label font-weight-bold">
            <input onfocus="reveal_other(this)" class="other form-check-input" type="radio" name="Anonymat" id="Duree2" value="oui"> Je préfère être anonyme avec le pseudo ci-dessous
            <input type="text" class="other_text form-control mt-2 col-sm-6" name="Pseudo" placeholder="Votre pseudo">
          </label>
        </div>
      </div>
      <hr></hr>
      <div class="mt-4 form-group border border-info rounded-top col-sm-5 bg-info">
        <h5 class="font-weight-bold" style="color:white">Merci d'avance !</h5>
      </div>
      <p class="text-center">Solidairement et à bientôt...</p>
      <div class="text-center">
        <button type="submit" class="btn btn-warning btn-lg">Envoyer</button>
      </div>
    </form>
  </div>
