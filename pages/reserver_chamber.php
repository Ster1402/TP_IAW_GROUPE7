<!--Auteurs : Emmanuella & NDE TSAPI-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/MaiTaiga/header.css" />
    <link rel="stylesheet" href="../styles/MaiTaiga/footer.css" />
    <link rel="stylesheet" href="../styles/SterDevs/normalize.css" />
    <link rel="stylesheet" href="../styles/SterDevs/formulaire.css" />

    <title>Reserver une chambre</title>
</head>

<body>

    <div id="root">
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
                    Citées Universitaires Cameroun
                </h1>
            </div>

        </header>

        <main id="container">

            <?php if (!isset($_GET['success'])) { ?>

                <!--Formulaire réservation chambre-->
                <form action="../scripts/SterDevs/reservation.php" method="POST" id="form">

                    <h1 id="titre__form">Réserver une chambre</h1>

                    <fieldset id="divers">
                        <legend>Cité universitaire</legend>
                        <div class="champs">

                            <p class="ligne_form">
                                <label for="rate">Dans quel université voulez vous réservez ? : </label>

                                <select class="univ" name="univName" id="univ__select">

                                    <?php
                                    require('../scripts/Class/cite_u.php');
                                    $univNames = CiteU::getAll();

                                    foreach ($univNames as $univName) {
                                    ?>

                                        <option class="univ" value="<?= $univName['univName'] ?>">Cité universitaire de <?= $univName['univName'] ?></option>

                                    <?php } ?>

                                </select>
                            </p>

                        </div>
                    </fieldset>

                    <fieldset id="personnel">
                        <legend>Information personnel</legend>
                        <div class="champs">

                            <p class="ligne_form">
                                <label for="name">Nom : </label><input name="name" id="name" type="text" />
                            </p>

                            <p class="ligne_form">
                                <label for="surname">Prénom : </label><input name="surname" id="surname" type="text" />
                            </p>

                            <P>
                            <p class="radio">
                                <label>Sexe :</label>

                                <input type="radio" name="genre">Masculin</input>
                                <input type="radio" name="genre">Feminin</input>
                                <span class="marge__droite"></span>
                            </p>
                            </P>

                            <p class="ligne_form">
                                <label for="matricule">Matricule : </label><input name="matricule" id="matricule" type="text" />
                            </p>

                            <p class="ligne_form">
                                <label for="filiere">Filière : </label><input name="filiere" id="filiere" type="text" />
                            </p>

                            <p class="ligne_form">
                                <label for="niveau">Niveau : </label><input name="niveau" id="niveau" type="text" />
                            </p>

                            <p class="ligne_form">
                                <label for="birthday">Date de naissance : </label><input name="birthday" id="birthday" type="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />
                            </p>

                            <p class="ligne_form last">
                                <input class="btn" type="reset" title="Réinitialisé" name="Réinitialisé" />
                                <input class="btn btn-green" type="submit" name="Reserver" />
                            </p>

                        </div>
                    </fieldset>

                </form>

            <?php
            } ?>

            <?php if(isset($_GET['success'])) {?>

                <h2 class="success">Réservation réussit !</h2>

            <?php    
            }?>

        </main>

        <footer id="footer">

            <div class="address"></div>
            <div class="copyright"></div>
            <div class="contact"></div>

        </footer>
    </div>
</body>

</html>