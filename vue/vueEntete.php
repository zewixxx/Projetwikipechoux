<?php
// vueEntete.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleEntete.css">
    <title></title>
</head>
<body>
<div class="all">
    <div class="titre">
        <p>WIKIPECHOUX</p>

    </div>
    <nav>
        <label for="toggle">☰</label>
        <input type="checkbox" id="toggle" class="checkbox1">
        <div class="main_pages">
            <div class="espace"></div>
        <li class="nav-item">
                    <a class="nav-link" href="./?action=acceuil">Acceuil</a>
                </li>
                
                <div class="barre-grise"></div>

                <li class="nav-item">
                    <a class="nav-link" href="./?action=intro">Introduction</a>
                </li>

                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=rechercheParAlphabet">Recherche par mot</a>
                </li>
            
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=theme">Recherche par theme</a>
                </li>
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=madeleines">Madeleine</a>
                </li>
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=motAleatoire">Mot aléatoire</a>
                </li>
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=flashCode">Flash code</a>
                </li>
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=historique">Historique</a>
                </li> 
                <div class="barre-grise"></div>
                <br> 
                
                <?php
                    if(isset($_SESSION['login'])){
                ?>
                <div class="espace2"></div>
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a href="./?action=mesInfos" class="nav-link">Mes informations</a>
                </li>
                
                <div class="barre-grise"></div>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=login&type=out">Se déconnecter</a>
                </li>
                <div class="barre-grise"></div>
                <?php }else{?>
                <li class="nav-item">
                    <a class="nav-link" href="./?action=login&type=in">Se connecter</a>
                </li>

                
                
                
                <?php }?>

            </ul>

            


    </div>









    <div class="mid">
  <div class="row row1">
      <div class="col-sx-12 col-md-12 col-lg-12">
          <form id="searchForm" action="./?action=affichage" class="d-flex flex-row" method="POST">
              <input type="text" id="mot" name="mot" placeholder="Saisir un mot..." class="form-control" onfocus="clearPlaceholder(this)">
              <div class="proposition">
                  <div id="suggestionsContainer" class="suggestions-container" style="display: block;"></div>
              </div>
              <script src="modele/suggestion.js"></script>
              <img src="image/loupe-icon.png" alt="Search Icon" class="search-icon">
              <!-- La balise </button> était incorrecte dans votre code, je l'ai supprimée -->
          </form>
      </div>
  </div>
</div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.querySelector('#searchForm input[type="text"]');
        var searchIcon = document.querySelector('#searchForm .search-icon');

        searchIcon.addEventListener('click', function() {
            searchInput.classList.toggle('show');
            if (searchInput.classList.contains('show')) {
                setTimeout(function() {
                    searchInput.focus();
                }, 0);
            }
        });
    });
</script>





  <script>
    function clearPlaceholder(input) {
      input.placeholder = '';
    }
  </script>

</div>

