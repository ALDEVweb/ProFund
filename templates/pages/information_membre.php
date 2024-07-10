<?php

// template : affiche le formulaire d'inscription
//              si option = creation : affiche tout
//              si option = modification et utilisateurconnecte = utilisateurmodif : affiche tout  chargé de ses infos
//              si option = modif et utilisateur connecte = gest : affiche info chargé des infos, mais pas mdp
//              si option = mdp : n'affiche que la partie mdp
// parametres : idUserConnecte : si utilisateur connecté
//              idUserModif : id de l'utilisateur à modifier si modification par gestionnaire
//              error : 1 si erreur ou manquant, 0 sinon
//              Les valeurs saisies : nom - prenom - mail - tel - addresse - cp - ville

?>