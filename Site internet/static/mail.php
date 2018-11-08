<?php

/** Nouvelle fonction mail pour le FAI Free, conforme au standard
 * De temps en temps les courriels ne sont pas envoyés, mais pourtant la fonction mail() renvoie True
 * ce qui n'est pas conforme a la spécification PHP de cette fonction.
 * De manière empirique, il a été déterminée qu'un temps d'envoi au moins égal à 2 secondes est une garantie que le courriel
 * est vraiment envoyé.
 * Si le mail est vraiment envoyé, une notification de rejet est bien envoyé par Free à l'adresse de l'expéditeur du message
 * Copyright 2013 - a@a.a <tmp12311@free.fr>
 * Licence : CeCILL-B, http://www.cecill.info
 * Merci à Gaming Zone <http://gaming.zone.online.fr> pour ses tests ayant permis de déterminer la durée
 * */
function mailFree($to , $subject , $message , $additional_headers=null , $additional_parameters=null) {
	$start_time = time();
	$resultat=mail ( $to , $subject, $message, $additional_headers, $additional_parameters);
	$time= time()-$start_time;
	return $resultat & ($time>1);
}
/** Fin de la définition de la fonction*/


/** Le code qui suit est juste donné comme exemple de test de la fonction
 *
 * Code de test de la fonction
 * Modifié par Al <les.pages.perso.chez(chez)free.fr>
 * Styles CSS basés sur le projet Better Web Readability Project CSS Library <http://code.google.com/p/better-web-readability-project/>
 *  */

/* Mettre ici l'adresse mail de votre site Web : si votre site est http://monsite.free.fr/ alors votre adresse email est monsite@free.fr */
$admin = 'Jarez Solidarités <jarezsolidarites@free.fr>';

$dest="klem33@gmail.com";
$sujet='Promesse de don Jarez Solidarités';
$message="Ma foi,\nTout semble fonctionner correctement.";
$additional_headers = "Cc: $admin\r\n";
$additional_headers .= "From: $admin\r\n";
$additional_headers .= "MIME-Version: 1.0\r\n";
$additional_headers .= "Content-Type: text/plain; charset=utf-8\r\n";
// $additional_headers .="Reply-To: $admin\r\n";
$additional_headers .="Return-Path: $admin\r\n";

		while (mailFree( $dest, $sujet , $message, $additional_headers )==false) {
      mailFree( $dest, $sujet , $message, $additional_headers );
    }
?>
