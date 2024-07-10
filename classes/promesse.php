<?php

namespace fraldev\classes;

/*

classe promesse étendu de la classe _model

    Utilisation :

        * Parametrage : à définir 
            protected $table = "promesse" - table correspondante dans la bdd (à modifier si nécessaire)
            protected function define() - fonction de definition des champs de la table
            
        * Méthodes :

*/

class promesse extends \fraldev\modeles\_model {

    protected $table = "promesse";

    protected function define(){
        // création des champs de la class
        // $this->addField("nom du champ", $type = "LINK", $libelle = "Utilisateur", $link = "utilisateur");
    
        $this->addField("projet", "LINK", "Projet", "utilisateur");
        $this->addField("investisseur", "LINK", "Investisseur", "utilisateur");
        $this->addField("montant", "NUMBER", "Montant");
        $this->addField("date", "DATE", "Date");
    }

}