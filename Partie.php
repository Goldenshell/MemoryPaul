<!DOCTYPE html>

<html>
    <head>
        <title>TP Doctrine - Memory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="src/CSS/style.css">
        <script type="text/javascript" src="src/JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="src/JS/fonctions.js"></script>
    </head>
    <body>
        
        <?php
            
            require_once(dirname(__FILE__).'/global.php');
            use Memory\Entity\Image;
            use Memory\Entity\Partie;
            use Memory\Entity\Joueur;
            $daoimage = $entityManager->getRepository(Memory\Entity\Image::class);
            $daopartie = $entityManager->getRepository(Memory\Entity\Partie::class);
            $daojoueur = $entityManager->getRepository(Memory\Entity\Joueur::class);
            
            $tableauImages = $daoimage->findAll();
            $tableauParties = $daopartie->findAll();
            $tableauJoueur = $daojoueur->findAll();
            
            $nbrCartes = 8;
            for ($i = 0; $i <= $nbrCartes; $i++)
            {
                $tableauCartes[$i] = rand(1,14);
                for ($j = 0; $j < $i; $j++)
                {             
                    while ($tableauCartes[$j] == $tableauCartes[$i])
                    {               
                        $tableauCartes[$i] = rand(1,14);               
                        $j = 0;             
                    }           
                }    
            }
            $tableauMemory = array_merge($tableauCartes, $tableauCartes);
            shuffle($tableauMemory);            
        ?>
        <div class="titre">
            <a href="index.php" class="fond_titre">Retour</a>
        </div>
        <form method="POST" action="Valide.php" id="formPartie">
            <table>
                <tr> 
                    <td class="menu_jeu">
                            <p style="float: right;"> Nombre de coups : <input type="number" id="nombreCoups" name="nombreCoups" min="0" value="0" readonly></p>
                            <p style="float: left;"> <input type="submit" value="Recommencer" name="restart" class="recommencer" /> </p>
                    </td>
                    <td style="width: 45%; height: 70%;" rowspan="2">
                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idJoueur">
                        
                        <?php
                            for($i = 0; $i < count($tableauMemory); $i++)
                            {
                                $carte = $daoimage->findByIdImage($tableauMemory[$i]);
                                $chemin = $carte[0]->getChemin();
                                echo "<img id='carte".$i . "' name='carte' src='src/Images/2Rafale.jpg' alt='image' style='width: 100px; height: 180px;  margin: 6px;' onclick='selectCarte(" . $carte[0]->getIdImage() . ", \" $chemin \", " . $i . "); compteCoups();'>";
                            }
                        ?>    
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border="1" class="tableau_score">
                            <thead>
                                <tr>
                                    <th> Nom du joueur </th>
                                    <th> Score </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $minScore = 100; // le score minimum (initialisé à un gros nombre)
                                    $tableauGagnant = array(); // tableau contenant les pseudos des scores minimums
                                    
                                    foreach ($tableauParties as $partie)
                                    {
                                        $idJoueur = $partie->getIdJoueur(); // récupère l'id du joueur
                                        $joueur = $daojoueur->findByIdJoueur($idJoueur); // récupère le joueur de la partie
                                        $pseudo = $joueur[0]->getPseudo(); // le pseudo du joueur
                                        $score = $partie->getNbCoups(); // score de la partie
                                        if ($score == $minScore) // le score du joueur = le score minimum
                                        {
                                            array_push($tableauGagnant, $pseudo); // ajout du pseudo dans le tableau
                                            
                                        }
                                        elseif ($score < $minScore)
                                        {
                                            $minScore = $score;
                                            $tableauGagnant = array(); // réinitialisation du tableau des meilleurs
                                            array_push($tableauGagnant, $pseudo); // ajout du pseudo dans le tableau
                                        }
                                        echo "<tr>";
                                            echo "<td>" . $pseudo . "</td>";
                                            echo "<td>" . $score . "</td>";
                                        echo "</tr>";
                                    } 
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> <?php echo "Meilleur score: " . $minScore; ?> </th>
                                    <th> 
                                        <?php
                                            for ($i = 0; $i < count($tableauGagnant); $i++)
                                            {
                                                echo "Gagnant: " . $tableauGagnant[$i] . "<br>"; 
                                            }
                                        ?> 
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>