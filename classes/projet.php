<?php

namespace fraldev\classes;

/*

classe projet étendu de la classe _model

    Utilisation :

        * Parametrage : à définir 
            protected $table = "promesse" - table correspondante dans la bdd (à modifier si nécessaire)
            protected function define() - fonction de definition des champs de la table
            
        * Méthodes :

*/

class projet extends \fraldev\modeles\_model {

    protected $table = "projet";

    protected function define(){
        // création des champs de la class
        // $this->addField("nom du champ", $type = "LINK", $libelle = "Utilisateur", $link = "utilisateur");
    
        $this->addField("porteur", "LINK", "Porteur", "utilisateur");
        $this->addField("titre", "TEXT", "Titre");
        $this->addField("description", "TEXTAREA", "Description");
        $this->addField("montant", "NUMBER", "Montant");
        $this->addField("date", "DATE", "Date");
        $this->addField("statut", "BOOLEAN", "Statut");
        $this->addField("valideur", "LINK", "Valideur", "utilisateur");
        $this->addField("commentaire", "TEXTAREA", "Commentaire");
    }

}