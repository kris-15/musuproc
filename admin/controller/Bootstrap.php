<?php
class Bootstrap{
    public function menu($titre, $lien = null){
        return <<<HTML
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-sm active" aria-current="page" href="#">
            $titre
            </a>
        </li>
HTML;
    }
}