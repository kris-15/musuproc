<?php
require 'Modele.php';
class Administrateur extends Model{
    public function get_etudiant(){
        $sql = "SELECT * FROM etudiants WHERE statut = ?";
        $etudiants = $this->prepare_sql($sql, ["ATTENTE"], true);
        return $etudiants;
    }
}