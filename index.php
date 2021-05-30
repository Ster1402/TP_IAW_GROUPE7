<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/SterDevs/normalize.css"/>
    <link rel="stylesheet" href="styles/MaiTaiga/style_accueil.css" />
    <link rel="stylesheet" href="styles/MaiTaiga/header.css" />
    <link rel="stylesheet" href="styles/MaiTaiga/footer.css" />

    <title>University Cities</title>
</head>
<body>

    <!--On vérifie si un admin veut se connecter-->
    <?php

        if(isset($_GET['admin'])) {
            header('Location: pages/login_admin.php');
        }

    ?>

    <div id="root">

        <header role="header" id="header">

            <nav id="menu">

                <ul class="menu__items">
                    <li class="item"><a href="index.php">Accueil</a></li>
                    <li class="item"><a href="pages/reserver_chamber.php">Reserver</a></li>
                    <li class="item"><a href="pages/louer_chambre.php">Louer</a></li>
                    <li class="item"><a href="pages/verifier_matricule.php">Vérifier matricule</a></li>
                </ul>

            </nav>

            <div id="banniere">
                <h1 id="titre">
                    Citées Universitaires Cameroun
                </h1>
            </div>

        </header>
        
        <main id="container">

            <div id="slider">
                <!--Ici l'on doit gérer les sliders-->

            </div>
        
        </main>

        <footer id="footer">

            <div class="address"></div>
            <div class="copyright"></div>
            <div class="contact"></div>

        </footer>

    </div>
    
</body>
</html>