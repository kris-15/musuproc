<?php

class DataClassEtudiants
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'tfc';
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->db_host};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }


    public function addEtudiant(array $etudiant) {
        $sql = "INSERT INTO inscription (nom, post_nom,numero,prenom,avenue,promotion,quartier,commune,profession,date,sexe) values(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $etudiant['nom']);
        $stmt->bindParam(2, $etudiant['post_nom']);
        $stmt->bindParam(3, $etudiant['numerp']);
        $stmt->bindParam(4, $etudiant['prenom']);
        $stmt->bindParam(5, $etudiant['avenue']);
        $stmt->bindParam(6, $etudiant['promotion']);
        $stmt->bindParam(7, $etudiant['quartier']);
        $stmt->bindParam(8, $etudiant['commune']);
        $stmt->bindParam(9, $etudiant['profession']);
        $stmt->bindParam(10, $etudiant['date']);
        $stmt->bindParam(11, $etudiant['sexe']);
        $stmt->execute();
        // gestion erreur
        $message = $stmt->errorInfo();
        return $message;
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