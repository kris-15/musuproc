<?php 
    require '../model/DataClassEtudiants.php';
    $etudiant = new Etudiant();
    $sensibilisations = $etudiant->get_sensibilisation();
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

    <title>Sensibilisation</title>
</head>


<body>

<div class="ui inverted segment" style="background-color:black">
  <div class="ui inverted secondary pointing menu"style="margin-left:77vh; margin-top:4vh">
  <i class="home icon"></i> <a class="active item" href="../model/acceuil.php">
      Accueil
    </a>
    <i class="file alternate icon"></i><a href="../view/services.html" class="item"> Services  </a>
    
  
    <i class="question circle icon"></i><a class="item" href="../view/sensibilisation.php">
      sensibilisation
    </a>
    <i class="edit icon"></i><a href="../view/inscription.php" class="item">S'inscrire  </a>   
   
      <i class="power off icon"></i><a href="../index.html" class="item">Se déconnecter   </a>
    
  </div>
  <p  style="margin-top:-17vh"><h1>MUSUPROCNET</h1>
<h6>Mutuelle de santé de l'université protestante au congo Network</h6></p> 
</div>
<h1 ><center>Message de sensibilisation</center></h1>
<?php foreach($sensibilisations as $sensibilisation): ?>
<div style="width:1000px;margin-left:4vh;padding:6vh; display :flex; flex-direction:row">
    <div style="margin: 10px;">
        <h2 style="font-size: 35px; font-style:italic"><?= $sensibilisation['titre']?></h4>
        <p style="font-size: 30px;"><?= $sensibilisation['message']?></p>
    </div>
    <div>
        <img src="../admin/images/<?= $sensibilisation['nom_image']??'bootstrap-themes.png'?>" alt="" width="500" height="200">
    </div>
</div>
<?php endforeach ?>



</div>
</body>

</html>