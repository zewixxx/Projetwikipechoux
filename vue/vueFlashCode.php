<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleFlashCode.css">
    <title></title>
</head>
<div class="flashcode1">


<body style="background-color: lightgray" >

    <div class="row">
        <div class="col-4 mx-auto text-center">
            <br>
            <h1>Flash Code</h1>
            <img src="image/flashCode.png" style="padding: 30px;" alt="Flash Code Image">
            
            <?php
            // Vérifier si des erreurs ont été transmises (par exemple, une erreur de code invalide)
            if (isset($erreur)) {
                echo '<p style="color: red;">' . $erreur . '</p>';
            }
            ?>

            <!-- Afficher le formulaire -->
            <form action="./?action=flashCode" method="POST">
            </form>
        </div>
    </div>
    <br>
    </div>
