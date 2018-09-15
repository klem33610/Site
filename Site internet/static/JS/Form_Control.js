$(function(){
  $('.other_text').each(function(){
    $(this).hide();
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
  console.log(statut);
  if (statut == true) {
    $('#Formulaire_yes').modal(show);
  }
  return statut;
}

function reveal_other(element) {
  $(element).siblings().show(300);
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
//    var PrenomOK = verifPrenom(f.prenom);
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
