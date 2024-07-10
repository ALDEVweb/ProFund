<?php

namespace fraldev\classes;

/*

classe promesse étendu de la classe _model

    Utilisation :

        * Parametrage : à définir 
            protected $table = "promesse" - table correspondante dans la bdd (à modifier si nécessaire)
            protected function define() - fonction de definition des champs de la table
            
        * Méthodes :
            listePromesse($idUser) : liste les promesse faites par l'utilisateur

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

    function listePromesse($idUser){
        // role : liste les promesse faites par l'utilisateur
        // parametre : aucun
        // retour : une mliste des promesse ordonnée par l'id

        // Construction
            // je récupère les promesse
            // joins avec les projet dont l'id du projet est le projet de la promesse
            // la ou l'investisseur est utilisateur connecté et le statut du projet est ACT
        $sql = "SELECT id, " . $this->makeFields() . " FROM `promesse` LEFT JOIN `projet` AS `projet` ON projet.id = promesse.projet WHERE promesse.investisseur = :idUser and projet.statut = 'ACT'";
        $param = [":idUser" => $idUser];

        // Préparation/Execution
        $req = $this->runSql($sql, $param);

        // récupération/retour
        return $this->recoverReqMulti($req);
    }
}