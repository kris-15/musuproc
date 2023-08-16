<?php 
    $description = "Message de sensibilisation";
    ob_start()
?>
<?php if(isset($message_succes)):?>
    <div class="alert alert-success"><?= $message_succes ?></div>
<?php endif ?>
<?php if(isset($erreur)):?>
    <div class="alert alert-danger"><?= $erreur ?></div>
<?php endif ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" placeholder="Le titre de votre message de sensibilisation" value="<?=isset($sensibilisation['titre'])?$sensibilisation['titre']:'' ?>">
    </div>
    <div class="form-group my-2">
        <label for="contenu" class="form-label">Message</label>
        <textarea class="form-control" id="contenu" name="contenu" placeholder="Tapez le contenu de votre message de sensibilisation" rows="4"><?=isset($sensibilisation['message'])?$sensibilisation['message']:'' ?></textarea>
    </div>
    <div class="form-group">
        <label for="titre" class="form-label">Image (Facultative)</label>
        <input type="file" class="form-control" id="titre" name="photo" placeholder="Le titre de votre message de sensibilisation">
    </div>
    <div class="d-flex my-2">
        <input type="submit" class="btn btn-dark form-control" name="soumettre" value="<?= isset($sensibilisation['id'])?'Modifiez':'Partagez' ?>">
    </div>
</form>
<div class="border-bottom border-top my-3"></div>
<?php foreach($sensibilisations as $sensibilise):?>
    <div class="container my-5">
        <div class="container col-xxl-8 px-4 py-3" >
            <div class="row flex-lg-row-reverse align-items-center g-5 p-4 pb-0 pe-lg-0 pt-lg-5 rounded-3 border shadow-lg">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="../images/<?= $sensibilise['nom_image']??'bootstrap-themes.png'?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis"><?= $sensibilise['titre'] ?></h1>
                <p class="lead"><?= $sensibilise['message'] ?></p>
                
                <form class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3" method="post">
                    <input type="hidden" name="id" value="1">
                    <button type="submit" name="action" class="btn btn-outline-danger btn-lg px-4 me-md-2 fw-bold" value="supprimer">Supprimer</button>
                    <button type="submit" name="action" class="btn btn-outline-secondary btn-lg px-4" value="modifier">Modifier</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php 
    $contenu = ob_get_clean();
    require '../layout/app.php'
?>