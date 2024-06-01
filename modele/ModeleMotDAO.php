<?php
    include_once "$racine/classes/Mot.php";
    require_once("Connexion.php");
    require_once("ModeleThemeDAO.php");

    
    class ModeleMotDAO{
        
       
        
        
        //Méthodes
       

        // retourne un tableau associatif à 2 dimensions (1 ligne / n colonnes) contenant toutes les constellations
        // On retourne un tableau à 2 dimensions pour harmoniser les traitements de la vue résultat
        public static function getMotbyId($motID) {
            $sql = "Select * from mot where id = :motID";
            $req = Connexion :: getInstance()->prepare($sql);
            $req->bindValue(":motID",$motID,PDO::PARAM_INT);
            $req->execute();
            $ligne= $req->fetch();
            
            $unMot = null ;
            if ($ligne) {
                $unMot = new Mot($ligne['id'], $ligne['libelle'], $ligne['definition'], $ligne['date_creation'], ModeleThemeDAO::getThemeById($ligne['id_theme']));
            }          
            
            return $unMot;
        } 
        
        public static function getMotbyLibelle($libelle) {
            $libelle = $libelle.'%';
            $sql = "Select * from mot where libelle LIKE :libelle";
            $req = Connexion :: getInstance()->prepare($sql);
            $req->bindValue(":libelle",$libelle,PDO::PARAM_STR);
            $req->execute();
            $ligne= $req->fetch();
            
            $unMot = null ;

            if ($ligne == true){
                $unMot = new Mot($ligne['id'],$ligne['libelle'],$ligne['definition'],$ligne['date_creation'],ModeleThemeDAO::getThemeById($ligne['id_theme']) ) ;
            }
           
            return $unMot;
            
        } 
        
        public static function getMotbyTheme($id_theme) {
            $sql = "Select * from mot where id_theme = :id_theme";
            $req = Connexion :: getInstance()->prepare($sql);
            $req->bindValue(":id_theme",$id_theme,PDO::PARAM_INT);
            $req->execute();
            $curseur= $req->fetchall();
            //var_dump($curseur);
            $unMot = null ;
            $resultat = NULL;
            foreach($curseur as $ligne){
                $unMot = new Mot($ligne['id'],$ligne['libelle'],$ligne['definition'],$ligne['date_creation'],ModeleThemeDAO::getThemeById($ligne['id_theme']) ) ;
                $resultat[] = $unMot;
            }
            
            
            return $resultat;
        } 
        
        
        
        public static function getMotsByLettre($lettre){
            $sql = "SELECT mot.*, Theme.id As Theme  FROM mot JOIN theme ON mot.id_theme = theme.id WHERE mot.libelle like :mot";
            $req = Connexion :: getInstance()->prepare($sql);
            $req -> bindValue(':mot',$lettre.'%');
            $req-> execute();
            $curseur = $req->fetchall();

            foreach($curseur as $ligne)
            {       
                $unTheme = ModeleThemeDAO::getThemeById($ligne['id_theme']);
                $unMot = new Mot($ligne['id'],$ligne['libelle'],$ligne['definition'],$ligne['date_creation'], $unTheme); //** ,$ligne['theme']*/
                $resultat[] = $unMot;
            }
                return $resultat;            

        }

        
        
        public static function  isPhoto($idMot)
        {
            $sql = "select count(*) as nb from photo where id_mot = ".$idMot;
            $isPhoto = true;
            $req = Connexion::getInstance()->query($sql);
            $nb = $req->fetchColumn();

            if($nb == 0)
            {
                $isPhoto = false;
            }
            
            return $isPhoto;
        }
        
        
        public static function getPhoto ($idMot)
        {
            if (self::isPhoto($idMot))
            {

                $req = Connexion::getInstance()->prepare("Select fichier from photo where id_mot = ".$idMot);
                $req->execute();
                $lesPhotos = $req->fetchall();
                return $lesPhotos;
            }
        }

        public static function getMotSuivant($idMot) 
        {
            $idMotSuivant = $idMot + 1;

            $sql = "SELECT * from mot where id =  ".$idMotSuivant;
            $req = Connexion::getInstance()->query($sql);
            $ligne = $req->fetch(); // Récupérez le résultat

            $unMotSuivant = null ;

            if ($ligne == true){
                $unMotSuivant = new Mot($ligne['id'],$ligne['libelle'],$ligne['definition'],$ligne['date_creation'],ModeleThemeDAO::getThemeById($ligne['id_theme']) ) ;
            }

            return $unMotSuivant;
            
        }
            public static function getMotPrecedent($idMot)
            {
                $idMotPrecedent = $idMot - 1;
    
                $sql = "SELECT * from mot where id =  ".$idMotPrecedent;
                $req = Connexion::getInstance()->query($sql);
                $req = Connexion::getInstance()->query($sql);
    
                $ligne = $req->fetch();
    
                $unMotPrecedent = null;
                if ($ligne == true){
                    $unMotPrecedent = new Mot($ligne['id'],$ligne['libelle'],$ligne['definition'],$ligne['date_creation'],ModeleThemeDAO::getThemeById($ligne['id_theme']) ) ;
                }
                
                return $unMotPrecedent;
            }
    
            public static function getMotSuivantApercu($idMot) 
            {
                $idMotSuivant = $idMot + 1;
    
                $sql = "SELECT * from mot where id =  ".$idMotSuivant;
                $req = Connexion::getInstance()->query($sql);
                $ligne = $req->fetch(); 
    
                $unMotSuivant = null ;
    
                if ($ligne == true){
                    $unMotSuivant = [
                        'id' => $ligne['id'],
                        'libelle' => $ligne['libelle']
                    ];
                }
    
                return $unMotSuivant;
    
            }

            
            public static function getMotPrecedentApercu($idMot) 
            {
                $idMotPrecedent = $idMot - 1;

                $sql = "SELECT * from mot where id =  ".$idMotPrecedent;
                $req = Connexion::getInstance()->query($sql);
                $ligne = $req->fetch(); 

                $unMotPrecedent = null ;

                if ($ligne == true){
                    $unMotPrecedent = [
                        'id' => $ligne['id'],
                        'libelle' => $ligne['libelle']
                    ];
                }

                return $unMotPrecedent;
            }
    
            
            public static function obtenirMotsAssocies($motID) {
                // Récupérer le mot principal
                $motPrincipal = self::getMotbyId($motID);
            
                // Vérifier si le mot principal a été trouvé
                if ($motPrincipal) {
                    // Récupérer les mots associés par thème
                    $motsAssociesParTheme = self::getMotbyTheme($motPrincipal->getTheme()->getId());
            
                    // Récupérer les mots associés par lettre
                    $motsAssociesParLettre = self::getMotsByLettre($motPrincipal->getLibelle()[0]);
            
                    // Fusionner les résultats (éliminer les doublons)
                    $motsAssocies = array_merge($motsAssociesParTheme, $motsAssociesParLettre);
                    $motsAssocies = array_unique($motsAssocies, SORT_REGULAR);
            
                    return $motsAssocies;
                }
        
            return null; // Retourner null si le mot principal n'est pas trouvé
        }
        
            
    }   

