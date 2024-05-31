<?php

// Intégration des modèles
include_once "$racine\modele\ModeleMotDAO.php";
include_once "$racine\classes\Mot.php";

// Fonction pour obtenir le mot par ID ou par libellé
function getMot($id = null, $libelle = null) {
    if ($id !== null) {
        $unMot = ModeleMotDAO::getMotbyId($id);
    } elseif ($libelle !== null) {
        $mot = strtoupper($libelle);
        $unMot = ModeleMotDAO::getMotbyLibelle($mot);
    } else {
        return null;
    }

    return $unMot;
}

// Récupération des données du formulaire (GET ou POST)
$id = filter_input(INPUT_GET, "mot", FILTER_VALIDATE_INT);
$motLibelle = filter_input(INPUT_POST, "mot");

// Obtention du mot
$unMot = getMot($id, $motLibelle);

if ($unMot != null) {
    $estTrouve = true;
    
    $idMot = $unMot->getId();
    $lesPhotos = ModeleMotDAO::getPhoto($idMot);
    $libelle = $unMot->getLibelle();
} else {
    $estTrouve = false;
}

// Entête
include "$racine/vue/vueEntete.php";

// Affichage
include "$racine/vue/vueAffichage.php";

// Pied de page
include "$racine/vue/vuePied.php";
?>
