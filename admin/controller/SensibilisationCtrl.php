<?php
require '../model/Administrateur.php';
$admin = new Administrateur();
$nom_traite = "";
function traitement_fichier(){
    if($_FILES['photo']['error'] === 4){
        $erreur = "Image non prise en charge";
    }else{
        $nom_image = $_FILES['photo']['name'];
        $taille_image = $_FILES['photo']['size'];
        $nom_temporaire = $_FILES['photo']['tmp_name'];
        $extensions_valides = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $nom_image);
        $extension_image = strtolower(end($extension));
        if(!in_array($extension_image, $extensions_valides)){
            $erreur = "Cette extension n'est pas reconnu dans notre système";
            return [false, $erreur];
        }elseif($taille_image > 1000000){
            $erreur = "Le fichier est trop grand";
            return [false, $erreur];
        }else{
            $nom_traite = uniqid().'.'.$extension_image;
            $test = move_uploaded_file($nom_temporaire, '../images/'.$nom_traite);
            return $nom_traite;
        }
    }
}
if(isset($_POST['soumettre'])){
    extract($_POST);
    $reponse = traitement_fichier();
    if(!is_array($reponse)){
        $nom_traite = $reponse;
        $partage = $admin->partager_message($titre, $contenu, $nom_traite);
        if($partage){
            $message_succes = "Le message de sensibilisation partager avec succès";
        }else{
            $erreur = "Echec de partage du message";
        }
    }else{
        $erreur = $reponse[1];
    }
}
if(isset($_POST['action'])){
    extract($_POST);
    if($action == 'modifier'){
        $sensibilisation = $admin->get_sensibilisation_par_id($id);
    }elseif($action == 'supprimer'){

    }
}
$sensibilisations = $admin->get_sensibilisation();
require '../view/sensibilisation.php';