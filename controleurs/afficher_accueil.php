<?php

// controleur : Si utilisateur connecté : demande l'affichage de la page d'accueil
//                 /- fournit liste des projet à financer
//                 /- si gestionnaire connecté fournit liste projet à valider
//                 /- si investisseur connecté, fournit liste de ses promesse et liste de ses projets financés
//              sinon demande l'affichage de la page de connexion
// parametres : /SESSION idUserConnecte : id de l'utilisateur connecté
//              /GET error : 1 si prb, 0 sinon (partout)
//              /GET creation : 1 si mail process creation, 0 sinon (connexion)
//              /GET modifInfo : 1 si process modif, 0 sinon (accueil)
//              /GET newMdp : 1 si process new mdp, 0 sinon (connexion)
//              /GET mdpOubli : 1 si process oubli, 0 sinon (connexion)
//              /GET verif : 1 si token verif (suite crea), 0 sinon (connexion)
//              /GET dde : 1 si process dde, 0 sinon (action porteur affiche sur connexion)
//              /GET promesse : 1 si promesse ok, 0 sinon (action investisseur affiche sur accueil)
//              /GET statut : 1 si projet accepté, 2 si refusé, 0 sinon (action gest affiche sur accueil)
//              /GET desactive : 1 si action desactivé, 0 sinon (action gest affiche sur accueil)
//              /GET connectEchec : 1 si echec connexion, 0 sinon (connexion)


// initialisation

use fraldev\classes\projet;
use fraldev\classes\promesse;

use function fraldev\utils\session_idconnected;
use function fraldev\utils\session_isconnected;

include "utils/init.php";
include "utils/verif_connexion.php";

// récupération
$idUserConnecte = session_isconnected() ? session_idconnected() : 0;
$error = isset($_GET["error"]) ? $_GET["error"] : 0;
$creation = isset($_GET["creation"]) ? $_GET["creation"] : 0;
$modifInfo = isset($_GET["modifInfo"]) ? $_GET["modifInfo"] : 0;
$newMdp = isset($_GET["newMdp"]) ? $_GET["newMdp"] : 0;
$mdpOubli = isset($_GET["mdpOubli"]) ? $_GET["mdpOubli"] : 0;
$verif = isset($_GET["verif"]) ? $_GET["verif"] : 0;
$dde = isset($_GET["dde"]) ? $_GET["dde"] : 0;
$promesse = isset($_GET["promesse"]) ? $_GET["promesse"] : 0;
$statut = isset($_GET["statut"]) ? $_GET["statut"] : 0;
$desactive = isset($_GET["desactive"]) ? $_GET["desactive"] : 0;
$connectEchec = isset($_GET["connectEchec"]) ? $_GET["connectEchec"] : 0;

// traitement
// fournir la liste des projet à financer (tout les projet dont le statut est actif et trié par date récente)
$projet = new projet();
$filtreActif = ["statut" => "ACT"];
$triActif = ["-date"];
$listeProjet = $projet->listAll($filtreActif, $triActif);

// fournir la liste des projet à valider si gestionnaire connectée
if($userConnecte->role == "GES"){
    $filtreDde = ["statut" => "ATT"];
    $triDDe = ["-date"];
    $listeDde = $projet->listAll($filtreDde, $triDde);
}

// fournir la liste des projets financé et des promesse faites si investisseur connecté
if($userConnecte == "INV"){
    $listeFinance = $projet->listeFinance($idUserConnecte);
    $promesse = new promesse();
    $listePromesse = $promesse->listePromesse($idUserConnecte);
}

// affichage
$title = "ProFund";
$metaDesc = "Application de mise en relation entre porteurs de projet et investisseurs";
$page = "accueil";
include "templates/layout.php";