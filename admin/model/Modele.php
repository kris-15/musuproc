<?php 

class Model{
    /**
     * Permet de faire la connexion avec la base des données Mysql
     * @return PDO 
     */
    public function pdo(){
        $pdo = new PDO('mysql:host=localhost;dbname=tfc;', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $pdo;
    }
    public function prepare_sql($sql, Array $valeurs, $fetch = false){
        $requete = $this->pdo()->prepare($sql);
        $requete->execute($valeurs);
        $donnees = true;
        if($fetch){
            $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        }
        return $donnees;
    }

}