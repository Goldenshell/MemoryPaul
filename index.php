<!DOCTYPE html>

<html>
    <head>
        <title>TP Doctrine - Memory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="src/CSS/style.css">
        <script type="text/javascript" src="src/JQuery/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="src/JS/ajax.js"></script>
    </head>
    <body>
        
        <?php
            require_once(dirname(__FILE__).'/global.php');
            use Memory\Entity\Joueur;
            $daojoueur = $entityManager->getRepository(Memory\Entity\Joueur::class);
            $tableauJoueur = $daojoueur->findAll();
        ?>
        
        <div class="titre">
            <a href="index.php" class="fond_titre">Retour</a>
        </div>
        <br>
        <div class="connexion">
            <form method="POST" action="Preparation.php">
                <label> Enregistrer un nouveau pseudo : </label>
                <input type="text" name="pseudo" required>
                <input type="submit" name="enregistrer" value="Enregistrer">
                
                <?php
                    if (isset($_GET['erreur']))
                    {
                        echo "<span class='erreur'> Pseudo déjà enregistré </span>";
                    }
                ?>
                
            </form>
            <br><br>
            <form method="POST" action="Preparation.php">
                <label> Sélectionner le joueur : </label>
                <select name="selectJoueur">
                    <optgroup label="Pseudos enregistrés">
                        <?php
                            foreach ($tableauJoueur as $joueur)
                            {
                                echo "<option value='" . $joueur->getIdJoueur() . "'>" . $joueur->getPseudo() . "</option>";
                            }
                        ?>
                    </optgroup>
                </select>
                <br><br>
                <input type="submit" name="debut" value="C'est parti!" class="debut_partie">
            </form>
        </div>
    </body>
</html>