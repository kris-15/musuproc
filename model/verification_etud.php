<?php
include('connexion.php');


$code = $_POST['code'];
$mot = $_POST['mdp'];


$reponse = $con->query("SELECT * FROM etudiant");

while ($donnees = $reponse->fetch()) {



    if ($_POST['code'] == $donnees['code'] and $mot == $donnees['mdp']) {
        header("Location: acceuil.php");
    } else {
        echo "code et mot de passe incorrects";
    }
}
