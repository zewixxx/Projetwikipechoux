<?php


if(isset($_POST['Rechercher'])&& $_POST['Rechercher']){
    //inclut le modèle nécessaire
    include_once "$racine/modele/ModeleMotDAO.php";

    //récupération de la lettre et du mot grâce à la lettre

    $lettre = filter_input(INPUT_POST, "lettre", FILTER_SANITIZE_SPECIAL_CHARS);

    $lesMots = ModeleMotDAO::getMotsByLettre($lettre);
    //VAR_DUMP($lesMots);

    //entete

    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueRechercheParAlphabet.php";
    include "$racine/vue/vuePied.php";
}
else{
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueRechercheParAlphabet.php";
    include "$racine/vue/vuePied.php";
}