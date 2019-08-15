var afficher_mail = false;

$(function(){
  $('.other_text').each(function(){
    $(this).hide();
  })
  $("#DateIncident").datetimepicker({
    format: "MM/YYYY",
    locale: "fr",
    sideBySide: true,
  });
  $('.tab_choice').click(function(){
    if (afficher_mail == true){
      id = this.id;
      mail = $('#' + id).find('textarea').text();
      $("#Formulaire_yes").find("#mail").text(mail);
      $("#Formulaire_yes").find("#champ_mail").show(400);
      $("#Formulaire_yes").find("#mail").change(function(){
        $('#' + id).find('textarea').text($(this).text());
      })
  }
  })
})
function verif() {
  var statut;
  var length = $(".other:checked").length;
  if (length == 0 && $(".is-invalid").length > 0) {
    $(".is-invalid").each(function(){
      $(this).removeClass('is-invalid');
    })
  }
  $(".other:checked").each(function(index){
    if (!$(this).siblings().val()){
      $(this).siblings().addClass('is-invalid');
    } else {
      $(this).siblings().removeClass('is-invalid');
      $(this).siblings().addClass('is-valid');
    }
  })
  if ($(".is-invalid").length > 0) {
    statut = false;
  } else {
    statut = true;
  }
  if (statut == true) {
    $('#Formulaire_yes').modal('show');
  }
  console.log(statut)
  return statut;
}

function reveal_other(element) {
  $(element).siblings().show(300);
}

function Selection(ligne) {
  if (ligne.checked == true) {
    $("#Formulaire_yes").find('#'+ ligne.id).show();
  } else {
    $("#Formulaire_yes").find('#'+ ligne.id).hide();
  }
}

function modal_show(etat) {
  if (etat.id == "yes"){
    $("#Formulaire_yes").find('.modal-title').text("Confirmer l'encaissement des dons suivants ?");
    $("#Formulaire_yes").find("#champ_mail").hide();
    $("#Formulaire_yes").find("#Don_OK").show();
    $("#Formulaire_yes").find("#Don_NOK").hide();
    afficher_mail = false;
  } else {
    $("#Formulaire_yes").find('.modal-title').text("Confirmer la relance mail des membres suivants ?");
    $("#Formulaire_yes").find("#champ_mail").hide();
    $("#Formulaire_yes").find("#Don_OK").hide();
    $("#Formulaire_yes").find("#Don_NOK").show();
    afficher_mail = true;
  }
  $('#Formulaire_yes').modal('show');
}

function rappel_Dons(){
  $('#Formulaire_yes').modal('hide');
  var mail_tab = {};
  $('#Suivi_Dons').find('.checkbox').each(function(){
    if (this.checked == true){
      tr = $("#Formulaire_yes").find('#'+ this.id);
      mail = $(tr).find('#Mail').text();
      texte_mail = $(tr).find('#texte_mail').val();
      mail_tab[this.id] = {
        'mail' : mail,
        'text' : texte_mail,
        'id' : this.id
      };
    }
  })
  mail_tab = JSON.stringify(mail_tab);
  $.ajax({
    type: 'POST',
    url: '/static/mail.php',
    data: {'mail_tab': mail_tab},
  });
  $.ajax({
    type: 'POST',
    url: '/static/mysql/maj_BDD.php',
    data: {'mail_tab': mail_tab},
  });
}

function maj_BDD(){
  $('#Formulaire_yes').modal('hide');
  var id_tab = [];
  $('#Suivi_Dons').find('.checkbox').each(function(){
    if (this.checked == true){
      id_tab.push(this.id);
    }
  })
  id_tab = JSON.stringify(id_tab);
  $.ajax({
    type: 'POST',
    url: '/static/mysql/maj_BDD.php',
    data: {'id_tab': id_tab},
    success: function() {
      location.reload();
    }
  });
}

function membreDocs(){
  var carte_tab =[];
  var recus_tab =[];
  $('#membercard').find(':checkbox').each(function () {
    if ($(this).is(':checked')) {
      tr = $("#membercard").find('#' + this.id).parent().parent();
      prenom = $(tr).find('#prenom').text();
      nom = $(tr).find('#nom').text();
      date = $(tr).find('#date').text();
      if ($(this).hasClass("card")) {
        carte_tab.push({
          'prenom': prenom,
          'nom': nom,
          'id': this.id,
          'date' : date
        });
      } 
      if ($(this).hasClass("fiscal")) {
        recus_tab.push({
          'prenom': prenom,
          'nom': nom,
          'id': this.id,
          'date': date
        });
      }
    }
  })
  if (carte_tab[0]) {
    carte_tab = JSON.stringify(carte_tab);
    $.ajax({
      type: 'POST',
      url: '/static/CarteMembre_template.php',
      data: { 'carte_tab': carte_tab },
      success: function () {
        window.location.href ="/static/CarteMembre_template.php";
      }
    });
  }
  if (recus_tab[0]) { 
    recus_tab = JSON.stringify(recus_tab);
  }
}

//   if ($(".other1").prop('checked') == true && $(".other2").prop('checked') == true) {
//         if ($('.other1').siblings().val() && $('.other2').siblings().val()) {
//           statut = true;
//         } else {
//           $('.other').each(function(){
//             if (!$(this).siblings().val()) {
//               $(this).siblings().addClass('is-invalid');
//             } else {
//               $(this).siblings().removeClass('is-invalid');
//               $(this).siblings().addClass('is-valid');
//             }
//           statut = false;
//         });
//       }
//       } else {
//         $('.other').each(function(){
//           if ($(this).prop('checked') == true && $(this).siblings().val()) {
//             console.log($(this).siblings().val)
//             statut = true;
//           } else if ($(this).prop('checked') == true && !$(this).siblings().val()) {
//               $(this).siblings().addClass('is-invalid');
//               statut = false;
//           }
//         });
//       }
//   return statut;
// }

// function surligne(champ, erreur)
// {
//    if(erreur)
//       $(this).css("background-color","#fba");
//    else
//       $(this).css("background-color","");
//       //champ.style.backgroundColor = "";
// };
//
// function verifNom(champ)
// {
//    if($(this).val().length < 2 || ($(this).val().length > 25))
//    {
//       surligne(champ, true);
//       return false;
//    }
//    else
//    {
//       surligne(champ, false);
//       return true;
//    }
// };
//
// function verifPrenom(champ)
// {
//    if(champ.value.length < 2 || champ.value.length > 25)
//    {
//       surligne(champ, true);
//       return false;
//    }
//    else
//    {
//       surligne(champ, false);
//       return true;
//    }
// };
//
// function verifMail(champ)
// {
//    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
//    if(!regex.test(champ.value))
//    {
//       surligne(champ, true);
//       return false;
//    }
//    else if (regex.test(champ.value) || champ.value == 0)
//    {
//       surligne(champ, false);
//       return true;
//    }
// }
//
// function verifCP(champ)
// {
//   if(champ.value.length < 5 && champ.value.length > 0)
//   {
//      surligne(champ, true);
//      return false;
//   }
//   else if (champ.value.length == 0)
//   {
//     surligne(champ, true);
//     return false;
//   }
//   else if (isNan(champ.value) == true) {
//     surligne(champ, true);
//     return false;
//   }
//   else
//   {
//      surligne(champ, false);
//      return true;
//   }
// };
//
// function verifRadio_Montant(champ)
// {
//    if ($("#Montant_Choice1").attr('checked') == false && $("#Montant_Choice2").attr('checked') == false && $("#Montant_Choice3").attr('checked') == false && $("#Montant_Choice4").attr('checked') == false && $("#Montant_Choice5").attr('checked') == false && $("#Montant_Choice6").attr('checked') == false)
//    {
//      surligne(this, true);
//      return false;
//    }
//    else if ($("#Montant_Choice6").attr('checked') == true && !$("#Montant_Autre").value())
//    {
//      surligne(this, true);
//      return false;
//    }
//    else {
//      surligne(this, false);
//      return true;
//    }
// };
//
// function verifRadio_Duree(champ)
// {
//    if ($("#Duree1").attr('checked') == false && $("#Duree2").attr('checked') == false && $("#Duree3").attr('checked') == false)
//    {
//      surligne(this, true);
//      return false;
//    }
//    else if ($("#Duree3").attr('checked') == true && !$("#Duree_Autre").value())
//    {
//      surligne(this, true);
//      return false;
//    }
//    else {
//      surligne(this, false);
//      return true;
//    }
// };
//
// function verifForm(f)
// {
//   console.log("culé")
//    verifRadio_Montant()
//    verifRadio_Duree()
//    var NomOK = verifNom(f.nom);
//    var PrenomOK = verifPrenom(f.Prenom);
//    var mailOk = verifMail(f.email);
//    var ageOk = verifAge(f.age);
//    var CPOk = verifCP(f.cp);
//    var Radio_Montant_OK = verifRadio_Montant(f.Montant)
//    var Radio_Duree_OK = verifRadio_Montant(f.Duree)
//
//    if(NomOK && PrenomOK && mailOk && ageOk && CPOk && Radio_Montant_OK && Radio_Duree_OK)
//       return true;
//    else
//    {
//       alert("Merci de vérifier les champs");
//       return false;
//    }
// }
