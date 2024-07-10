<?php

// controleur : Si utilisateur connecté : demande l'affichage de la page d'accueil
//                 - récupère liste des projet à financer
//                 - si gestionnaire connecté récupère liste projet à valider
//                 - si investisseur connecté, récupère liste de ses promesse et liste de ses projets financés
//              sinon demande l'affichage de la page de connexion
// parametres : SESSION idUserConnecte : id de l'utilisateur connecté
//              GET error : 1 si prb de connexion, 0 sinon
//              GET creation : 1 si mail process creation, 0 sinon
//              GET modif : 1 si process modif, 0 sinon
//              GET newMdp : 1 si process new mdp, 0 sinon
//              GET mdpOubli : 1 si process oubli, 0 sinon
//              GET verif : 1 si token verif (suite crea), 0 sinon
//              GET dde : 1 si process dde, 0 sinon
//              GET promesse : 1 si promesse ok, 0 sinon
//              GET statut : OK si projet accepté, NOK sinon
//              GET desactive : 1 si action desactivé, 0 sinon
//              GET connect : 1 si echec connexion, 0 sinon


// initialisation
include "utils/init.php";

// récupération

// traitement

// affichage
echo "accueil<br><br>";
echo "<a href='index.php?controleur=afficher_information_membre'>Connecter</a>";