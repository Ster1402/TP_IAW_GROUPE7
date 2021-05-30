<?php
/*Connexion a la BD*/
require("../Class/connect.php");


/* Recuperer le nom de l'utilisateur et son mot de passe */
if (isset($_POST['username']) && isset($_POST['password'])) {
    $nomCode = $_POST['username'];
    $password = $_POST['password'];

    /* Recuperer le contenu de la table admin*/
    $valeursR = $conn->query('SELECT * FROM Admin');

    /* Verification de correspondance */
    while ($donnees = $valeursR->fetch(PDO::FETCH_ASSOC)) {
        $nomCodeDB = $donnees['nomCode'];
        $passwordDB = $donnees['password'];

        if (($nomCode == $nomCodeDB) && ($password == $passwordDB)) {
            header('Location: ../../pages/Accueil_admin.php?univ='.$donnees['univ']); //On précise l'université de l'admin
            break;
        } else {
            $error = "Echec de connexion. Veuillez recommencer !";
            //header('Location: ../../pages/login_admin.php?error=' . $error);
        }
    }
    
    $valeursR->closeCursor();
}