<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLogin.css">
    <title></title>
</head>

<div class="contenuLogin">

        <div class="container">
            <!-- zone de connexion -->
            
            <form action="./?action=verif" method="POST">
                <h1>Connexion</h1>
                
                <?php 
                    if(isset($_GET['error'])){
                ?>
                <p style="color: red;">Une erreur dans le nom d'utilisateur ou le mot de passe a été rencontré</p>
                <?php }?>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
</div>
