<?php
require '../model/Administrateur.php';
$admin = new Administrateur();
$etudiants = $admin->get_etudiant();
$compteur = 1;

require '../view/index_admin.php';