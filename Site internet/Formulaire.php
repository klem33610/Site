<div class="col-sm-6">
  <h5 class="text-center">FORMULAIRE POUR ENGAGER UN VERSEMENT MENSUEL</h5>
  <form action="static/mysql/post_BDD.php" method="post" class="border border-warning rounded" style="padding : 20px 20px">
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
          <label for="Prenom">Prénom</label>
          <input type="text" class="form-control" name="Prenom" placeholder="Prénom">
        </div>
        <div class="form-group col-md-6">
          <label for="Nom">Nom</label>
          <input type="Nom" class="form-control" name="Nom" placeholder="Nom">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tel-fix" class="form-label">Telephone Fixe</label>
          <input class="form-control" type="tel" placeholder="05...." name="Tel_fix">
        </div>
        <div class="form-group col-md-6">
          <label for="tel-mobile" class="form-label">Telephone Portable</label>
          <input class="form-control" type="tel" placeholder="06...." name="Tel_mobile">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="example-email-input" class="col-form-label">Email</label>
          <input class="form-control" type="email" value="exemple@example.com" name="Mail">
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
          <input type="text" name="CP" class="form-control">
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
          <h9>Si vous l'avez oublié, contacter jarezsolnamearites@free .fr</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio1" value="option1"> 5
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio2" value="option2"> 10
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio3" value="option3"> 20
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio4" value="option4"> 50
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio5" value="option5"> 100
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
              <input class="form-check-input" type="radio" name="Montant" id="inlineRadio6" value="option6"> Autre
              <input type="text" class="form-control" name="Montant_Autre">
            </label>
          </div>
        </div>
      </div>
      <div class="form mt-3">
        <div class="form-group">
          <h5 class ="font-weight-bold">Pendant quelle durée ? <span style="color : red">*</span></h5>
          <h9>Si vous l'avez oublié, contacter jarezsolnamearites@free .fr</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Duree" id="Duree1" value="option1"> 6 mois
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Duree" id="Duree2" value="option2"> 1 an
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Duree" id="Duree3" value="option3"> 2 ans
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
              <input class="form-check-input" type="radio" name="Duree" id="Duree3" value="option3"> Autre
              <input type="text" class="form-control" name="Duree_Autre">
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
              <input class="form-check-input" type="radio" name="Aide_Urgence" id="Duree1" value="option1"> Oui
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Aide_Urgence" id="Duree2" value="option2"> Non
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="form mt-4">
        <div class="form-group">
          <h5 class="font-weight-bold">Je souhaite faire un commentaire ou apporter une précision</h5>
          <input type="text" class="form-control" name="Commentaire" placeholder="Votre réponse">
        </div>
      </div>
      <p class="text-center">Les informations recueillies sur ce formulaire sont destinées exclusivement à vous tenir informé(e). Conformément à la loi n° 78-17 du 6 janvier 1978 modifiée, vous disposez d’un droit d’accès, de modification, de rectification et de suppression des données vous concernant. Pour exercer ce droit veuillez écrire à jarezsolidarites@free .fr. Merci !</p>
      <div class="form-group mt-3">
        <div class="form-check form-check-inline">
          <label class="form-check-label font-weight-bold">
            <input class="form-check-input" type="radio" name="Anonymat" id="Duree1" value="option1"> J'accepte que mes Nom et Prénom figurent sur notre site Web
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label font-weight-bold">
            <input class="form-check-input" type="radio" name="Anonymat" id="Duree2" value="option2"> Je préfère être anonyme avec le pseudo ci-dessous
          </label>
        </div>
        <input type="text" class="form-control mt-2 col-sm-6" name="Pseudo" placeholder="Votre pseudo">
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
