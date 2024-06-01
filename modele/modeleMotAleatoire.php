<?php

require_once("Connexion.php");



require_once("Connexion.php");

class ModeleMotAleatoire {
    public static function getMotRandom() {
        $sql = "SELECT libelle, definition FROM mot ORDER BY rand() LIMIT 1";
        $req = Connexion::getInstance()->prepare($sql);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
