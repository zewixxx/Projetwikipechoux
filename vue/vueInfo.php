<?php 
if(isset($_SESSION['login'])){
?> 
<center>
    <div class="container">
        <h1>Bonjour <?php 
        require_once './modele/ModeleUserDAO.php';
        $actualUser = ModeleUserDAO::getUser($_SESSION['login']); 
        echo $actualUser->getFirstname();?></h1>


        <p>Pseudo : <?php echo $actualUser->getUsername();?></p>
        <p>Nom de famille : <?php echo $actualUser->getName();?></p>
        <p>Email : <?php echo $actualUser->getMail();?></p>

        <a href="./?action=modifInfo&citron=tarte">Mettre à jour mes données</a>
        <a href="./?action=modifInfo&citron=jaune">Modifier mon mot de passe</a>
    </div>
</center>
<?php }
else{
    header("Location: ./?action=defaut");
}