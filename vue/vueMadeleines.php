<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleMadeleines.css">
    <title></title>
</head>   
   
   
   <div class="contenuMadelaines" >
            <div>
                <h3>
                    <center>
                        La peinture, art de la couleur par excellence, dont les principes de base sont de mélanger des matières colorantes d’origine végétale ou animale est la source de mon journal intime.
                        <br>
                        En effet, quotidiennement je fabrique une madeleine unique avec le pigment dominant du jour.
                        <br>
                        Ce journal est un livre ouvert où je me livre pour ne pas me quitter moi-même, une sorte de mise en mouvement de la philosophie, une évidence de la vie qui me donne la sensation d’inachèvement.
                        <br>
                        Ces madeleines, qui le constituent, me ramènent à la lisière du sentir et du palpable. Elles créent une alchimie qui élargit mon champ de conscience et dilate ma sensibilité. 
                        Faire des madeleines est une forme de liberté. Comment rendre le peu, sinon en disant la même chose sans se répéter.
                        <br>
                        Etre tenu en éveil dans le quotidien, est ma richesse d’un plaisir du faire.
                    </center>
                </h3>
                <h2>
                    <center>
                        <font color="#2E86C1"><b>Cliquez sur une madeleine ....</b></font>
                    </center>

                </h2>
                <br> <br>
                <table class="table col-md-8 mx-auto text-center">
                    <thead>
                        <tr>
                            <th scope="col text-center">Id</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once "./modele/ModeleMadeleinesDAO.php";
                            $lesMadeleines = ModeleMadeleinesDAO::getMadeleines();
                            foreach($lesMadeleines as $uneMadeleine){
                        ?>
                        <tr >
                            <td> <?= $uneMadeleine -> getId() ?></td>
                            <td>
                                <a class = 'nav-link' href='./?action=detail&id=<?= $uneMadeleine -> getId() ?>'><img src="./image/petitesMadeleines/<?=$uneMadeleine->getImage()?>" alt=""  height="130px" width="200px"> </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
