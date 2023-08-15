<?php
session_start();
require '../model/DataClassEtudiants.php';
$etudiant = new Etudiant();
$information;
$couleur = 'black';
if(isset($_SESSION['code'])){
    $code_session = $_SESSION['code'];
    $information = $etudiant->info_etudiant($code_session);
}

if(isset($_POST['connecter'])){
    extract($_POST);
    $information = $etudiant->verifier_etudiant($code, $matricule);
    if($information){
        $_SESSION['code'] = $information['code'];
        if($information['statut'] == 'ATTENTE'){
            $couleur = 'blue';
            $message = "Votre inscription est en attente de validation! Veuillez patienter s'il vous plaît";
        }elseif($information['statut'] == 'REJETE'){
            $couleur = 'red';
            $message = "Votre inscription a été rejeté";
        }elseif($information['statut'] == 'ACCEPTE'){
            $couleur = 'green';
            $message = "Votre inscription a été validée";
        }
    }else{
        $message_erreur =  'Identifiants incorrects';
    }
    

}
require "../view/espace.php";