<?php
    $description = "Inscription";
    ob_start();
    ?>
    <h3>Les étudiants en attente d'inscription</h3>
    <?php if(empty($etudiants)):?>
        <div class="alert alert-warning text-center">
            Aucun étudiant en attente !
        </div>
    <?php else : ?>
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
                                <a href="" class="btn btn-sm btn-outline-success">Validé</a>
                                <a href="" class="btn btn-sm btn-outline-danger mx-1">Rejeté</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php endif ?>
<?php
$contenu = ob_get_clean();
require '../layout/app.php';
?>