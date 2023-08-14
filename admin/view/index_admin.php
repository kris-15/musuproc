<?php
    $description = "Inscription";
    ob_start();
    
    ?>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="post" class="d-flex">
                <input type="text" class="form-control " name="requete" placeholder="Faites une recherche à partir du nom de l'étudiant" required>
                <button type="submit" class="btn btn-dark mx-1" name="recherche" value="ATTENTE">Recherche</button>
                
            </form>
        </div>
        <form action="" method="post" class="my-4">
            <div class="d-flex">
                <label for="" class="form-label fw-bold">Les inscriptions :</label>
                <div class="" style="width: 300;">
                    <select name="statut_inscription" class="form-select form-select-sm mx-1" id="">
                        <option value="ATTENTE">EN ATTENTE</option>
                        <option value="ACCEPTE">VALIDEES</option>
                        <option value="REJETE">REJETEES</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-dark mx-2" name="statut">Filtrer</button>
            </div>
        </form>
    </div>
    <h3 class="m-3 text-center fs-italique"><?= strtoupper($titre) ?></h3>
    <?php if(empty($etudiants)):?>
        <div class="alert alert-warning text-center">
            Nous n'avons trouvé aucune inforrmation relative à votre recherche
        </div>
    <?php else : ?>
        <?php if(isset($message)): ?>
            <div class="alert alert-success p-2 text-center mt-2"><?= $message?></div>
        <?php elseif(isset($message_echec)): ?>
            <div class="alert alert-danger p-2 text-center mt-2"><?= $message_echec ?></div>
        <?php endif ?>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Noms complets</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($etudiants as $etudiant): ?>
                            <tr>
                                <td><?= $compteur++ ?></td>
                                <td><?= $etudiant['matricule'] ?></td>
                                <td><?= $etudiant['nom'].' '.$etudiant['postnom'].' '.$etudiant['prenom'] ?></td>
                                <td><?= $etudiant['promotion']. ' / '. $etudiant['faculte']?></td>
                                <td class="d-flex">
                                    <?php if($etudiant['statut']=="ACCEPTE"): ?>
                                        <span class="text-success">Déjà validé</span>
                                    <?php elseif($etudiant['statut']=="REJETE"): ?>
                                        <form action="" method="post">
                                        <input type="hidden" name="id_etudiant" value="<?= $etudiant['id']?>">
                                        <button type="submit" name="statut_etudiant" class="btn btn-sm btn-outline-warning mx-1" value="ATTENTE">Remettre en attente</button>
                                        </form>
                                    <?php else: ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_etudiant" value="<?= $etudiant['id']?>">
                                        <button type="submit" name="statut_etudiant" class="btn btn-sm btn-outline-success" value="ACCEPTE">Validé</button>
                                        <button type="submit" name="statut_etudiant" class="btn btn-sm btn-outline-danger mx-1" value="REJETE">Rejeté</button>
                                    </form>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="btn-toolbar mb-2 mt-2 mb-md-0">
        </div>
        <hr>
    <?php endif ?>
<?php
$contenu = ob_get_clean();
require '../layout/app.php';
?>