<?php
require 'Modele.php';
class Administrateur extends Model{

    /**
     *======================================== Partie étudiant =======================================
     */

    /**
     * Permet de récupérer tous les étudiants selonun statut défini
     * @param string $statut
     * @return array Etudiant
     */
    public function get_etudiant(String $statut){
        $sql = "SELECT * FROM etudiants WHERE statut = ?";
        $etudiants = $this->prepare_sql($sql, [$statut], true);
        return $etudiants;
    }
    /**
     * Permet de récupérer la liste des étudiants dont le nom match au nom de la recherche
     * @param string $recherche
     * @return array Etudiant
     */
    public function get_etudiant_recherche($recherche){
        $sql = "SELECT * FROM etudiants WHERE nom LIKE '%?'";
        $etudiants = $this->prepare_sql($sql, [$recherche], true);
        return $etudiants;
    }
    /**
     * Permet de modifier le statut d'inscription d'un étudiant
     * @param int $id_etudiant
     * @param string $statut
     */
    public function modifier_statut_etudiant($id_etudiant, $statut){
        $sql = "UPDATE etudiants SET statut = ? WHERE id = ?";
        $modifier = $this->prepare_sql($sql, [$statut, $id_etudiant]);
        return $modifier;
    }

    /**
     * ====================================== Partie Livret de santé ======================================
     */

    /**
     * Permet d'ajouter un livret de santé en attente d'impression
     * @param int $id_etudiant
     * @return bool $insertion
     */
    public function creer_livret($id_etudiant){
        $sql = "INSERT INTO livrets (etudiant_id) VALUE (?)";
        $insertion = $this->prepare_sql($sql, [$id_etudiant]);
        return $insertion;
    }
    /**
     * Permet de récupérer tous les livrets selon un filtre
     * @param string $statut_livret
     * @return array $livrets
     */
    public function get_livret($statut_livret){
        $sql = "SELECT *, livrets.id as id_livret FROM livrets INNER JOIN etudiants ON livrets.etudiant_id =  etudiants.id WHERE statut_impression = ?";
        $livrets = $this->prepare_sql($sql, [$statut_livret], true);
        return $livrets;
    }

    /**
     * Permet de modifier le statut soit d'impression soit de disponibilité
     * @param string $cible le champ ciblé de la table
     * @param string $valeur la valeur souhaitée pour la cible
     * @param int $id_livret l'id de la cible dans la bdd
     */
    public function modifier_statut_livret($cible, $valeur, $id_livret){
        $sql = "UPDATE livrets SET $cible = ? WHERE id = ?";
        $modifier = $this->prepare_sql($sql, [$valeur, $id_livret]);
        return $modifier;
    }
}