<?php
class Bootstrap{
    public function menu($titre, $lien = null, $icone = "puzzle"){
        return <<<HTML
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="$lien">
                <svg class="bi"><use xlink:href="#{$icone}"/></svg>
                $titre
            </a>
        </li>
HTML;
    }
}