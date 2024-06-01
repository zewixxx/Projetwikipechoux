<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleMotAleatoire.css">
    <title></title>
</head>

<div class="contenuMotAleatoire">
    <div class="row">
        <div class="col-4 mx-auto text-center">

            <br> <br>
            <h1>Mot aléatoire</h1>
             
             <a href="./?action=motAleatoire" class="btn btn-primary">Mot aléatoire</a>

             <?php

            if (isset($motAleatoire['libelle']) && isset($motAleatoire['definition'])) {
                echo "<p class = 'motAleatoire'> Mot : " . $motAleatoire['libelle'] . "<br> Définition : " . $motAleatoire['definition'] . "</p>";
            } else {
                echo "<p>Aucun mot trouvé</p>";
            }
            ?>


        </div>
    </div>
</div>

