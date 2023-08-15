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
          
        
          <i class="question circle icon"></i><a class="item">
            A propos
          </a>
          <i class="question circle icon"></i><a class="item" href="../controler/etudiantCtrl.php">
            <?= (isset($_SESSION['code']))? $_SESSION['code']:'Espace' ?></a>
          <i class="edit icon"></i><a class=" active item">S'inscrire  </a>   
         
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
            <?php if(isset($erreur)):?>
              <p style="color: red;"><?= $erreur?></p>
            <?php endif ?>
            <?php if(isset($message)):?>
              <p style="color:green;"><?= $message?></p>
            <?php endif ?>
      <form class="ui mini form formululaire_inscrip" method="post" action="../controler/inscriptionCtrl.php">
       <center> <h3 class="ui dividing header">Formulaire de s'inscription à la MUSUPROC</h3></center>
       <?php if(isset($_SESSION['code'])): ?>
        <p style="color: red; font-weight:bold;font-size:large;">Vous êtes déjà inscrit</p>
      <?php else:?> 
       <div class="field">
            <div class="two fields">
                <div class="field" style="width:400px">
                    <label>Nom</label>
                    <input type="text" name="nom"   placeholder="Entre votre nom" required>
                    <div class="field">
                        <label>Postnom</label>
                        <input type="text" name="postnom" id="post" placeholder="Entrez votre post_nom" required>
                    </div>
                    <div class="field" style="width:400px">
                        <label>Prenom</label>
                        <input type="text" name="prenom" placeholder="Entrez votre post_nom" required>
                    </div>
                      </div>
                </div>
                <div class="field" style="width:400px">
                        <label>Sexe</label>
                        <select name="sexe" id="" required>
                          <option value=""></option>
                          <option value="MASCULIN">MASCULIN</option>
                          <option value="FEMININ">FEMININ</option>
                        </select>
                    </div>
                <div class="two fields">
                  <div class="field" style="width:410px">
                      <label>Matricule</label>
                      <input type="text" name="matricule"   placeholder="Entre votre matricule" required>
                      <div class="field">
                          <label>Nationalité</label>
                          <input type="text" name="nationalite" id="avenue" placeholder="Entrez votre nationalité" required>
                      </div>
                      <div class="field" style="width:410px">
                          <label>Promotion</label>
                          <select name="promotion" id="" required>
                            <option value=""></option>
                            <option value="L1 LMD">L1 LMD</option>
                            <option value="L2 LMD">L2 LMD</option>
                            <option value="G3">G3</option>
                            <option value="L1 ANCIEN SYSTEME">L1 ANCIEN SYSTEME</option>
                            <option value="L2 ANCIEN SYSTEME">L2 ANCIEN SYSTEME</option>
                          </select>                      
                        </div>
                  </div>
                  </div>
                  <div class="field" style="width:410px">
                        <label>Faculté</label>
                        <select name="faculte" id="" required>
                          <option value=""></option>
                          <option value="THEOLOGIE">THEOLOGIE</option>
                          <option value="FASE">FASE</option>
                          <option value="DROIT">DROIT</option>
                          <option value="MEDECINE">MEDECINE</option>
                          <option value="FASI">FASI</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>Adresse</label>
                        <input type="text" name="adresse" id="adr" placeholder="Entrez votre adresse" required>
                    </div>
                    <div class="field" style="width:400px">
                        <label>telephone</label>
                        <input type="text" name="telephone" id="prof" placeholder="Entrez votre numero de telephone" required>
                    </div>
                    <div class="field" style="width:400px">
                      <label>Lieu de naissance</label>
                      <input type="text" name="lieu" id="date" placeholder="Entrez votre lieu de naissance" required>
                    </div>
                    <div class="field" style="width:400px">
                      <label>Date de naissance</label>
                      <input type="date" name="date" id="date" placeholder="Entrez votre lieu de naissance" required>
                    </div>
            </div>
              <input type="hidden" name="code" value="<?= strtoupper("MUPC".substr(uniqid(), 7))?>">
            <div class="ui mini buttons">
                <button class="ui negative button " id="button_annuler" type="reset">
                  <i class="cancel icon"></i>Annuler
                </button>
                <div class="ou"></div>
                <button class="ui positive button " type="submit" id="button_enregistrer" name="envoyer">
                  <i class="checkmark icon"></i>Envoyer
                </button>
            </div>
      </form>
      <div class="ui modal">
          <i class="close icon"></i>
          <div class="header">
              <i class="mail icon"></i>
            Message
          </div>
          <div class="image content">
            <i class="green checkmark icon"></i>
            <div class="description">
              <div class="ui header">
                  Enregistrement reussi
            </div>
          </div>
          <div class="actions">
            
            <div class="ui positive right labeled icon button">
            Informations envoyées avec succès
              <i class="checkmark icon"></i>
            </div>
          </div>
        </div>
        <?php endif?>
      </div>
  </div>
</body>      
</html>