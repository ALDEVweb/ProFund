<?php

namespace fraldev\utils;

/*

Code à inclure dans les controleurs qui ont besoin de la connexion

*/


// Si on n'est pas connexté : rediriger / afficher le formulaire de connexion
if ( ! session_isconnected()) {
    $title = "ProFund - Connexion";
    $metaDesc = "page de connexion de l'application ProFund";
    $page = "connexion";
    include "templates/layout.php";
    exit;
}