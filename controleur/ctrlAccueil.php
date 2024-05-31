<?php

// Inclut les modèles nécessaires
include_once "$racine/modele/ModeleMotDAO.php";
include_once "$racine/classes/Mot.php";

// Récupération du numéro d'objet saisi dans le textBox en POST FILTER_SANITIZE_STRING
$mot = filter_input(INPUT_POST, "mot", FILTER_SANITIZE_SPECIAL_CHARS);

if ($mot != null) {
    // On demande au modèle de récupérer les données nécessaires à l'affichage
    $unMot = ModeleMotDAO::getMotbyLibelle(strtoupper($mot));

    if ($unMot != null) {
        $idMot = $unMot->getId();
        $lesPhotos = ModeleMotDAO::getPhoto($idMot);
        $libelle = $unMot->getLibelle();
    }
    var_dump($unMot);
}

// Appel du script de vue qui permet de gérer l'affichage des données

// Entete
include_once "$racine/vue/vueEntete.php";

// Corps de la page
include_once "$racine/vue/vueAccueil.php";

// Pied de page
include_once "$racine/vue/vuePied.php";

