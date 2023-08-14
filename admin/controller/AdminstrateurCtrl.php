<?php
require '../model/Administrateur.php';
$admin = new Administrateur();

if(isset($_POST['statut_etudiant'])){
    extract($_POST);
    $message = validation($id_etudiant, $statut_etudiant, "Opération effectuée avec succès", "Echec de validation de l'élève");
    if($statut_etudiant == "ACCEPTE"){
        $livre = $admin->creer_livret($id_etudiant);
    }
}

function validation($id_etudiant, $statut, $message_succes, $message_echec){
    $admin = new Administrateur();
    $valider = $admin->modifier_statut_etudiant($id_etudiant, $statut);
    if($valider){
        return $message_succes;
    }
    return $message_echec;
}

$statut = 'ATTENTE';
$etudiants = $admin->get_etudiant($statut);
$titre = "Liste des inscriptions en {$statut}";
$compteur = 1;
if(isset($_POST['recherche'])){
    extract($_POST);
    if(isset($requete)){
        $etudiants = $admin->get_etudiant_recherche($requete);
    }
}
if(isset($_POST['statut'])){
    extract($_POST);
    $etudiants = $admin->get_etudiant($statut_inscription);
    $titre = "Liste des inscriptions {$statut_inscription}es";
}
require '../view/index_admin.php';