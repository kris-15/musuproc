<?php
    require '../controller/Bootstrap.php';
    $bootstrap = new Bootstrap();
?>
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">MUSUPROC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
        <?= $bootstrap->menu("Accueil", 'AdminstrateurCtrl.php', 'house-fill') ?>
        <?= $bootstrap->menu("Sensibilisation", 'SensibilisationCtrl.php', 'people') ?>
        <?= $bootstrap->menu("Livret de santé", 'LivretCtrl.php', 'file-earmark-text') ?>
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
            <?= $bootstrap->menu("Déconnexion", '', 'door-closed') ?>
        </ul>
    </div>
    </div>
</div>