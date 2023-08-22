<?php
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Semantic-UI/semantic.css">

    <script type="text/javascript" src="../Libs/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../Semantic-UI/semantic.js"></script>
    <script type="text/javascript" src="../controler/controler.js"></script>

    <title>Page d'inscription</title>
</head>
<body>
  
    <div class="ui inverted segment" style="background-color:black">
        <div class="ui inverted secondary  pointing menu" style="margin-left:117vh; margin-top:4vh">
        <i class="home icon"></i> <a href="../model/acceuil.php" class=" item">
            Acceuil
          </a>
          <i class="file alternate icon"></i><a href="services.html" class="item"> Services  </a>
          <i class="file alternate icon"></i>
            <a href="services.html" class="item" href="../view/sensibilisation.php">Sensibilisation  </a>
          
          <i class="question circle icon"></i><a class="active item" href="../controler/etudiantCtrl.php">
            <?= (isset($_SESSION['code']))? $_SESSION['code']:'Espace' ?></a>
          <i class="edit icon"></i><a class="  item" href="../controler/inscriptionCtrl.php">S'inscrire  </a>   
         
            <i class="power off icon"></i><a href="../controler/deconnexion.php" class=" item">Se déconnecter   </a>
          
        </div>
        <p style="margin-top:-17vh"><h1>MUSUPROCNET</h1>
      <h6>Mutuelle de santé de l'université protestante au congo Network</h6></p>
      </div>
      <div style="border: 1px solid sienna; width:500px;margin-left:6vh; padding:6vh; background-color:khaki">
<h2>inscription</h2><br>
L'inscription à la MUSUPROC permet à l'étudiante(e) de pouvoir devenir membre bénéficiares de la MUSUPROC;<br>
Cette inscription est valable pour tout étudiant(e) incrit à l'UPC mais aussi, <br>
Tout étudiant en ordre avec le paiement de frais académique d'au moins une tranche.<br><br>
Une fois l'inscription faite ce dernier sera en possession d'un livret de santé qui lui sera remis à la MUSUPROC <br>
pour bénéficier de ces soins et services.
<br><br>
L'inscription se fait via un Formulaire a remplir où sera stocker vos données;<br>
A noter que l'étudiant(e) ayant envoyer ses Informations doit se présenter à la MUSUPROC au sein du campus, <br>
pour la déposer deux photos passeport et montrer sa carte ou preuve de paiement pendant un délai de 2 semaines,<br>
Si ce dernier ne se présente pas alors son inscription sera annulée.


      </div>

    <div style="width:500px; margin-left:120vh;border:2px solid sienna; padding:6vh; margin-top:-82vh; z-index:1 ">
        <h1>Espace etudiant</h1> 
        <?php if(isset($_SESSION['code'])): ?>
            <h3 style="color: green;">Vous etes actif</h3>
            <p style="color: <?= $couleur ?>;"><?= isset($message)? $message:'' ?></p>
        <?php else: ?>
            <?= isset($message_erreur)?'<p style="color:red;">'. $message_erreur .'</p>': ''?>
            <form action="../controler/etudiantCtrl.php" method="post" class="ui mini form formululaire_inscrip">
                <div class="field">
                    <label>Matricule</label>
                    <input type="text" name="matricule" id="post" placeholder="Entrez votre matricule" required>
                </div>
                <div class="field" style="width:400px">
                    <label>Code</label>
                    <input type="text" name="code" placeholder="Entrez le code que vous avez reçu après inscription" required>
                </div>
                <center>
                    <div class="ui mini buttons">
                        <button class="ui positive button " type="submit" id="button_enregistrer" name="connecter">
                            <i class="checkmark icon"></i>Soumettre
                        </button>
                    </div>
                </center>
            </form>
        <?php endif ?>
    </div>
</body>      
</html>