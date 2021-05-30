<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/MaiTaiga/header.css"/>
    <link rel="stylesheet" href="../styles/MaiTaiga/footer.css"/>
    <link rel="stylesheet" href="../styles/SterDevs/normalize.css"/>

    <title>Accueil Admin <?=$_GET['univ']?> </title>
</head>
<body>
    
<div id="root">
        
<!--Affichage de la liste temporaire pour l'université-->
<?php

//On récupère les informations sur l'admin
require('../scripts/Class/admin.php');
$admin = new Admin("","","","","",$_GET['univ']);

?>

        <header role="header" id="header">

            <nav id="menu">

                <ul class="menu__items">
                    <li class="item"><a href="../index.php">Accueil</a></li>
                    <li class="item"><a href="reserver_chamber.php">Reserver</a></li>
                    <li class="item"><a href="louer_chambre.php">Louer</a></li>
                    <li class="item"><a href="verifier_matricule.php">Vérifier matricule</a></li>
                </ul>

            </nav>

            <div id="banniere">
                <h1 id="titre">
                    Citée universitaire de <?=$_GET['univ']?>
                </h1>
            </div>

        </header>

        <main id="container">

        </main>

        <footer id="footer">

            <div class="address"></div>
            <div class="copyright"></div>
            <div class="contact"></div>

        </footer>
    </div>
    

</body>
</html>