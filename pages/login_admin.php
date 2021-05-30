<!--Esther-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../styles/Esther/style_login_admin.css" />
    <link rel="stylesheet" href="../styles/SterDevs/formulaire.css"/>
    
    <title>Login Administrateur</title>
</head>

<body>

    <div id="root">

        <main id="container">

            <!--Formulaire login admin-->
            <form method="POST" action="../scripts/Esther/login_admin.php">
                <p class="error"> <?php
                                    if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    }
                                    ?> </p>
                <h1>Connexion</h1>

                <label for="Nom"><b>Nom code:</b></label>
                <p></p>
                <input type="text" name="username" id="Nom" placeholder="Entrez le nom d'utilisateur" required />
                <p></p>

                <label for="MDP"><b>Mot de passe:</b></label>
                <p></p>
                <input type="password" name="password" id="MDP" placeholder="Entrez le mot de passe" required />
                <p></p>

                <input type="submit" id="submit" value="LOGIN" />
                <p></p>

            </form>

        </main>

        <footer id="footer">

            <div class="address"></div>
            <div class="copyright"></div>
            <div class="contact"></div>

        </footer>
    </div>

</body>

</html>