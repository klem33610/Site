<div class="col-sm-6">
  <form method="post" class="border border-warning rounded" onsubmit="return verif()" action="static/mysql/post_BDD.php" style="padding : 20px 20px">
    <h4 class="text-center font-weight-bold">Adhésion / Renouvellement 2018"</h4>
    <p>Il suffit de remplir le présent formulaire et de régler de préférence avec le RIB ici : <br>
      <a href="http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf">http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf</a><br>
      Avec nos remerciements Solidaires et fraternels !</p>
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
          <input class="form-control" type="tel" placeholder="04...." name="TelFixe">
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
        <h5 style="color:white">Je souhaite participer à la vie associative</h5>
      </div>
      <div class="text-center">
        Toute forme de participation sera bienvenue ! Y compris à distance via Internet...
      </div>
      <div class="form mt-3">
        <div class="form-group">
          <h5 class="font-weight-bold">Membre actif</h5>
          <h9>Je souhaite participer dans le/les domaines suivants :</h9>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="ActifChoiceCA" id="ActifChoiceCA"> Membre du Collège Solidaire (CA)
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="ActifChoiceCom" id="ActifChoiceCom"> Communication
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="ActifChoiceAct" id="ActifChoiceAct"> Actions
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
              <input onfocus="reveal_other(this)" class="other form-check-input" type="checkbox" name="ActifChoiceAutre" id="ActifChoiceAutre"> Autre
              <input type="text" class="other_text form-control" id="ActifChoiceAutre" name="ActifChoiceAutre">
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="mt-4 form-group border border-info rounded-top col-sm-8 bg-info">
        <h5 style="color:white">Cotisation annuelle 10 € + don éventuel</h5>
      </div>
      <div class="text-center">
        NB : les dons et la cotisation sont déductibles des impôts sur le revenu à hauteur de 66%. <br>Ainsi si vous êtes imposable et que versez 100 €, il ne vous en coûtera que 34 €.
      </div>
      <div class="form mt-3">
        <div class="form-group">
          <h5 class="font-weight-bold">Quel montant ? <span style="color : red">*</span></h5>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="Montant_Choice" required> 5
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="Montant_Choice"> 10
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="Montant_Choice"> 20
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="Montant_Choice"> 50
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="Montant" id="Montant_Choice"> 100
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label form-group">
              <input onfocus="reveal_other(this)" class="other form-check-input" type="radio" name="Montant" id="Montant_Choice"> Autre
              <input type="text" class="other_text form-control" id="Montant_Autre" name="Montant_Autre" placeholder="Autre montant">
            </label>
          </div>
        </div>
      </div>
      <hr>
      <div class="mt-3 form-group border border-info rounded-top col-sm-6 bg-info">
        <h5 class="font-weight-bold" style="color:white">Réglement</h5>
      </div>
      <div>
        - De préférence par virement, RIB ici : <br>
        <a href="http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf">http://accueilmigrantsvalfy.free.fr/docs/JarezSolidarites/JarezSolidaritesRIB.pdf <br></a>
        - A défaut par chèque au nom de Jarez Solidarités
        A envoyer à Association Jarez Solidarités, 624 Chemin de la Thiollière 42320 SAINT CHRISTO EN JAREZ
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
            <input class="form-check-input" type="radio" name="Anonymat" required> J'accepte que mes Nom et Prenom figurent sur notre site Web
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label font-weight-bold">
            <input onfocus="reveal_other(this)" class="form-check-input" type="radio" name="Anonymat"> Je préfère être anonyme avec le pseudo ci-dessous
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
