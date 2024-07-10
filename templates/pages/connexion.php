<?php

// template : affiche le formulaire de connexion :
//             - champ mail mdp et connecter + mdp oublié + creer cpte + faire une dde de financement
// parametres : error : 1 si prb, 0 sinon (partout)
//              creation : 1 si mail process creation, 0 sinon (connexion)
//              newMdp : 1 si process new mdp, 0 sinon (connexion)
//              mdpOubli : 1 si process oubli, 0 sinon (connexion)
//              verif : 1 si token verif (suite crea), 0 sinon (connexion)
//              dde : 1 si process dde, 0 sinon (action porteur affiche sur connexion)
//              connectEchec : 1 si echec connexion, 0 sinon (connexion)

use fraldev\classes\utilisateur;

?>

<form action="index.php?controleur=connecter" method="POST">
    <?php
        $utilisateur = new utilisateur();
        $utilisateur->genForm("connexion", ["mail", "mdp"]);
    ?>
    <input type="submit" value="Me connecter">
    <?php if($error == 1) echo "<p class=''>Il y a une erreur de saisie sur ton mail ou mot de passe</p>"; ?>
</form>