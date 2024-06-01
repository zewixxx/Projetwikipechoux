<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleAffichageMot.css">
    <title></title>
</head>


<div class="contenuAffichage">

  <?php
  if ($estTrouve) {
    ?>
    <!-- Display the word information centered -->
    <center><h1><?=$unMot->getLibelle()?></h1></center> 
    <center><h2><?=$unMot->getDefinition()?></h2></center>
    
    <?php if (ModeleMotDAO::isPhoto($unMot->getId())): ?>
      <div class="slider-container">
        <div class="menu">
          <?php for ($i = 0; $i < count($lesPhotos); $i++): ?>
            <label for='slide-dot-<?=($i+1)?>'></label>
          <?php endfor; ?>
        </div>
        
        <?php for ($i = 0; $i < count($lesPhotos); $i++): ?>
          <input class="slide-input" id="slide-dot-<?=($i+1)?>" type="radio" name="slides" checked>
          <img class="slide-img" src="./image/<?=$lesPhotos[$i]['fichier']?>">
        <?php endfor; ?>
      
      </div>
    <?php endif; ?>

    <!-- Display links for the previous and next words -->
    <div>
      <?php
        $idMotPrecedent = ModeleMotDAO::getMotPrecedent($unMot->getId());
        $idMotSuivant = ModeleMotDAO::getMotSuivant($unMot->getId());
        $motSuivantApercu = ModeleMotDAO::getMotSuivantApercu($unMot->getId());
        $motPrecedentApercu = ModeleMotDAO::getMotPrecedentApercu($unMot->getId());

        echo '<div style="display: flex;">';
        echo '<div>';
        
        // Vérifier si $idMotPrecedent est un entier avant d'appeler getId()
        if (is_int($idMotPrecedent)) {
          echo '<button onclick="window.location.href=\'./?action=affichage&mot=' . $idMotPrecedent . '\'">Mot Précédent</button>';
        } elseif ($idMotPrecedent instanceof Mot) {
          echo '<button onclick="window.location.href=\'./?action=affichage&mot=' . $idMotPrecedent->getId() . '\'">Mot Précédent';
        }

        // Afficher l'aperçu du mot précédent
        if (isset($motPrecedentApercu)) {
            echo '<br>' . implode(",<br>\n", $motPrecedentApercu);
        }
        echo '</button>';

        echo '</div>';
        
        echo '<div>';
        
        // Vérifier si $idMotSuivant est un entier avant d'appeler getId()
        if (is_int($idMotSuivant)) {
          echo '<button onclick="window.location.href=\'./?action=affichage&mot=' . $idMotSuivant . '\'">Mot Suivant</button>';
        } elseif ($idMotSuivant instanceof Mot) {
          echo '<button onclick="window.location.href=\'./?action=affichage&mot=' . $idMotSuivant->getId() . '\'">Mot Suivant';
        }

        // Vérifier si $motSuivantApercu est défini avant d'utiliser implode
        if (isset($motSuivantApercu) && is_array($motSuivantApercu)) {
            echo '<br>' . implode(",<br>\n", $motSuivantApercu);
        }
        
        echo '</button>';
        echo '</div>';
        echo '</div>';
        
      ?>
    </div>
    
    <!-- Include the file with associated words -->
    <?php
      // Assurez-vous que $idMot est un objet Mot avant d'appeler getId()
      if ($idMot instanceof Mot) {
        $idMotValue = $idMot->getId();
      } else {
        // Définissez une valeur par défaut ou gérez l'erreur selon vos besoins
        $idMotValue = 0; // ou une autre valeur par défaut
      }

      $motsAssocies = ModeleMotDAO::obtenirMotsAssocies($idMotValue);
      include 'vue/vueAffichageMotsAssocies.php';
    ?>

  <?php
  } else {
  ?>
    <div> Mot inconnu </div>
  <?php
  }
  ?>
</div>