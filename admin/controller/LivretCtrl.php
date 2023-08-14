<?php
require '../model/Administrateur.php';
$admin = new Administrateur();
//Vérifie si on veut confirmé soit la disponibilité ou soit la récupération d'un livret de santé
if(isset($_POST['statut_livret'])){
    extract($_POST);
    $message = validation('statut_impression', $id_livret, $statut_livret, "Opération effectuée avec succès", "Echec de validation de l'élève");
}

/**
 * Permet la validation d'une action sur le livret
 */
function validation($cible = 'statut_impression', $id_livret, $statut, $message_succes, $message_echec){
    $admin = new Administrateur();
    $valider = $admin->modifier_statut_livret($cible, $statut, $id_livret);
    if($valider){
        return $message_succes;
    }
    return $message_echec;
}

//Initialisation des variables $statut, $livrets, $titre et $compteur
$statut = 'ATTENTE';
$livrets = $admin->get_livret($statut);
$titre = "Statut :  {$statut}";
$compteur = 1;
// echo '<pre>';
// print_r($livrets);
// echo '</pre>';
// die();
//Pour la partie recherche : si on veut collectionner des informations précises
if(isset($_POST['recherche'])){
    extract($_POST);
    if(isset($requete)){
        $livrets = $admin->get_etudiant_recherche($requete);
    }
}

//Pour recupérer les informations après filtrage
if(isset($_POST['statut'])){
    extract($_POST);
    $livrets = $admin->get_livret($statut_inscription);
    $titre = "Statut : $statut_inscription";
}
require '../view/livre_view.php';