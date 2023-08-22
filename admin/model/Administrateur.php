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

    /**
     * ===================================== Partie sensibilisation =========================================
     */
    /**
     * Cette fonction permet d'enregistrer un nouveau message de sensibilisation 
     * Qu'on pourra partager à tous les étudiants
     * @param string $titre Le titre du message
     * @param string $message Le contenu du message
     * @param string? $nom_image Le nom de la photo de la sensibilisation, optionnelle
     * @return bool $partager 
     */
    public function partager_message($titre, $message, $nom_image = null){
        $sql = "INSERT INTO sensibilisations (titre, message) VALUES (?, ?)";
        $partager = $this->prepare_sql($sql, [$titre, $message]);
        if($nom_image != null){
            $sql = "SELECT id FROM sensibilisations WHERE titre = ? AND message = ? ORDER BY date_creation DESC LIMIT 1";
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute([$titre, $message]);
            $sensibilisation_id = $stmt->fetch(PDO::FETCH_ASSOC);
            $sql = "INSERT INTO photo_sensibilisation (nom_image, sensibilisation_id) VALUES (?, ?)";
            $partager = $this->prepare_sql($sql, [$nom_image, $sensibilisation_id['id']]);
        }
        
        return $partager;
    }

    /**
     * Permet de récupérer les informations d'un message de sensibilisation à partir de son id
     * @param int $id_sensibilisation L'identifiant de la sensibilisation souhaitée
     * @return array $sensibilisation Les informations souhaitées
     */
    public function get_sensibilisation_par_id($id_sensibilisation){
        $sql = "SELECT * FROM sensibilisations WHERE id = ? LIMIT 1";
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([$id_sensibilisation]);
        $sensibilisation = $stmt->fetch(PDO::FETCH_ASSOC);
        return $sensibilisation;
    }
    /**
     * Permet de récupérer tous les messages dont le statut est ACTIVE
     * @return array $donnees
     */
    public function get_sensibilisation(){
        $sql = "SELECT *, sensibilisations.id as id_sens, photo_sensibilisation.id AS id_photo FROM 
                    sensibilisations left join photo_sensibilisation on sensibilisations.id = 
                    sensibilisation_id WHERE statut = ? ORDER BY sensibilisations.id DESC
                ";
        $donnnees = $this->prepare_sql($sql, ['ACTIVE'], true);
        return $donnnees;
    }

    public function modifier_sensibilisation($id_sensibilisation, $titre, $message){
        $sensibilisation = $this->get_sensibilisation_par_id($id_sensibilisation);
        $sql = "UPDATE sensibilisations SET titre = ?, message = ? WHERE id = ?";
        $modifier = $this->prepare_sql($sql, [$titre, $message, $sensibilisation['id']]);
    }
}