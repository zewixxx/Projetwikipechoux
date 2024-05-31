<?php

class Routeur{
    
    //Attributs
    private static $lesActions = array(
        'defaut' => 'ctrlAccueil.php',
        'affichage' => 'ctrlAffichageMot.php',
        'motAleatoire' => 'ctrlMotAleatoire.php',
        'rechercheParAlphabet' => 'ctrlRechercheParAlphabet.php',
        'dico' => 'ctrlDictionnaire.php',
        'theme' => 'ctrlTheme.php',
        'login' => 'ctrlLogin.php',
        'verif' => 'ctrlVerif.php',
        'mesInfos'=> 'ctrlInfo.php',
        'modifInfo' => 'ctrlModif.php',
        'updateInfo' => 'ctrlUpdateInfo.php',
        'updatePass' => 'ctrlUpdatePass.php',
        'madeleines' => 'ctrlMadeleines.php',
        'flashCode' => 'ctrlFlashcode.php',
        'detail' => 'ctrlDetailMadeleine.php',
        'intro' => 'ctrlIntroduction.php',  
        'historique' => 'ctrlHistorique.php'); 
        
    //Fonction qui retourne le fichier controleur à utiliser
    public static function getControleur($action){
   
        $controleur = self::$lesActions["defaut"];

        //Permet de vérifier que l'action existe et renvoie le nom du contrôleur PHP    
        if (array_key_exists ( $action , self::$lesActions )){
            $controleur = self::$lesActions[$action];
        }

        return $controleur;
    }
}