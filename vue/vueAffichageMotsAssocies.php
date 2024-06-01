<!-- Fichier : vue/vueAffichageMotsAssocies.php -->
<?php

if ($motsAssocies && is_array($motsAssocies) && !empty($motsAssocies)) {
    echo '<div>';
    echo '<h3>Mots associés :</h3>';
    echo '<ul>';

    foreach ($motsAssocies as $motAssocie) {
        // Utiliser une requête préparée pour optimiser la recherche dans la base de données
        $sql = "SELECT * FROM mot WHERE libelle LIKE :mot";
        $stmt = Connexion::getInstance()->prepare($sql);
        $stmt->bindValue(':mot', $motAssocie->getLibelle() . '%', PDO::PARAM_STR);
        $stmt->execute();

        $resultatRecherche = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultatRecherche) {
            // Si la recherche a abouti, afficher le mot associé avec un lien vers la page de définition
            echo '<li><a href="./?action=affichage&mot=' . $resultatRecherche['id'] . '">' . $resultatRecherche['libelle'] . '</a></li>';
        } else {
            // Sinon, afficher simplement le mot associé
            echo '<li>' . $motAssocie->getLibelle() . '</li>';
        }
    }

    echo '</ul>';
    echo '</div>';
} else {
    echo '<div>Aucun mot associé trouvé.</div>';
}
?>
