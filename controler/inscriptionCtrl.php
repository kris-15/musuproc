<?php
session_start();
require '../model/DataClassEtudiants.php';
$etudiant = new Etudiant();
if(isset($_POST['envoyer'])){
    extract($_POST);
    $exist = $etudiant->matricule_existe($matricule);
    var_dump($exist);
    var_dump($_SESSION['code']);
    if($exist == 0){
        $inscription = $etudiant->addEtudiant([$nom,$postnom,$prenom,$sexe,$matricule,
        $nationalite,$promotion,$faculte,$adresse,$telephone,$lieu,$date,$code]);
        if($inscription){
            $message = "Informations soumises avec succè ! Utilisez ce code : $code pour acceder dans votre espace";
            $_SESSION['code'] = $code;
        }
    }
    else{
        $erreur = 'L\'étudiant existe déjà avec ce matricule';
    }
}

require "../view/inscription.php";