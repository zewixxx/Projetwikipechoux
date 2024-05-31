<?php

// Inclure les modèles nécessaires
include_once "$racine/modele/ModeleMotAleatoire.php";
include "$racine/vue/vueEntete.php";

// Vérifiez si le paramètre d'action est défini
if (isset($_GET['action']) && $_GET['action'] === 'motAleatoire') {

    $motAleatoire = ModeleMotAleatoire::getMotRandom();
    
    // Inclure la vue pour afficher le résultat
    include "$racine/vue/vueMotAleatoire.php";
}else{
    include "$racine/vue/vueMotAleatoire.php";
}





  

//Vue pied de page
include "$racine/vue/vuePied.php";
