<?php
$page_courante = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <ul class="menu">

        <li>
            <a href="/index.php"
            <?php if($page_courante == 'index.php') echo 'class="actif"'; ?>>
            Accueil
            </a>
        </li>

        <li>
            <a href="/pages/bloc.php"
            <?php if($page_courante == 'bloc.php') echo 'class="actif"'; ?>>
            Bloc
            </a>
        </li>

        <li>
            <a href="/pages/about.php"
            <?php if($page_courante == 'about.php') echo 'class="actif"'; ?>>
            À propos
            </a>
        </li>

        <li>
            <a href="/pages/projects.php"
            <?php if($page_courante == 'projects.php') echo 'class="actif"'; ?>>
            Projets
            </a>
        </li>

    </ul>
</nav>