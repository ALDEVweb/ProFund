<?php

namespace fraldev\classes;

/*

classe projet étendu de la classe _model

    Utilisation :

        * Parametrage : à définir 
            protected $table = "promesse" - table correspondante dans la bdd (à modifier si nécessaire)
            protected function define() - fonction de definition des champs de la table
            
        * Méthodes :
            listeFinance($idUser) : liste les projet financé par l'utilisateur

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
        $this->addField("statut", "TEXT", "Statut");
        $this->addField("valideur", "LINK", "Valideur", "utilisateur");
        $this->addField("commentaire", "TEXTAREA", "Commentaire");
    }

    function listeFinance($idUser){
        // role : liste les projet financé par l'utilisateur
        // parametre : aucun
        // retour : une mliste des projet ordonnée par l'id

        // Construction
            // je sélectionne les projet
            // joins avec les promesse dont le projet de la promesse  est à l'id du projet
            // là ou l'investisseur de la promesse est l'id de l'utilisateur connecté et là ou le statut du projet est FIN
        $sql = "SELECT id, " . $this->makeFields() . " FROM `projet` LEFT JOIN `promesse` AS `promesse` ON promesse.projet = projet.id WHERE promesse.investisseur = :idUser and projet.statut = 'FIN'";
        $param = [":idUser" => $idUser];

        // Préparation/Execution
        $req = $this->runSql($sql, $param);

        // récupération/retour
        return $this->recoverReqMulti($req);
    }

}