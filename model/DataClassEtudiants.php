<?php
require '../admin/model/Modele.php';
class Etudiant extends Model
{
    public function matricule_existe($valeur){
        $sql = "SELECT count(id) FROM etudiants WHERE matricule = ?";
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([$valeur]);
        $resultat = $stmt->fetchColumn();
        return $resultat;
    }
    public function addEtudiant(array $etudiant) {
        $sql = "INSERT INTO etudiants (nom, postnom, prenom, sexe, matricule, nationalite,
                promotion, faculte, adresse, telephone, lieu, ddn, code) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";
        $stmt = $this->prepare_sql($sql, $etudiant);
        return $stmt;
    }
    public function info_etudiant($code){
        $sql = "SELECT *, livrets.id as id_livret FROM livrets RIGHT JOIN etudiants ON livrets.etudiant_id =  etudiants.id WHERE code = ?";
        $infos = $this->prepare_sql($sql, [$code], true);
        return $infos;
    }
    public function verifier_etudiant($code, $matricule){
        $sql = "SELECT *, livrets.id as id_livret, livrets.statut_impression as impression FROM livrets
         RIGHT JOIN etudiants ON livrets.etudiant_id =  etudiants.id WHERE code = ? AND matricule = ?";
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([$code, $matricule]);
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);

        return $infos;
    }
    public function get_sensibilisation(){
        $sql = "SELECT *, sensibilisations.id as id_sens, photo_sensibilisation.id AS id_photo FROM 
                    sensibilisations left join photo_sensibilisation on sensibilisations.id = 
                    sensibilisation_id WHERE statut = ? ORDER BY sensibilisations.id DESC
                ";
        $donnnees = $this->prepare_sql($sql, ['ACTIVE'], true);
        return $donnnees;
    }
  //  public function recupEtudiants(){
        //$sql = "SELECT * from inscription";
      //  $stmt = $this->conn->prepare($sql);
       // $stmt->execute();
       // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // return $result;  
  //  }
   // public function getEtudiantsByid(String $matricule){
        //$sql = "SELECT * from inscription WHERE matricule = ?";
       // $stmt = $this->conn->prepare($sql);
       // $stmt->execute([$matricule]);
      ////  $result = $stmt->fetch(PDO::FETCH_ASSOC);
       // return $result;  
   // }
}