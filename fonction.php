<?php
#Fonctions de validation et de nettoyage des données
function champ_requis(string $valeur): bool {
    return !empty(trim($valeur));
}

function nettoyer(string $valeur): string {
    return htmlspecialchars(trim($valeur));
}
?>