<?php

require('../Class/connect.php');
require('../Class/etudiant.php');
require('../Class/liste_temp.php');

if(isset($_POST['Reserver'])){

    $date = new DateTime($_POST['birthday']);

    //On récupère la date sous le format yyyy-mm-dd
    $birthday = $date->format('Y-m-d');

    $etudiant = new Etudiant($_POST['name'],$_POST['surname'],$birthday,$_POST['matricule'],$_POST['filiere'],$_POST['niveau']);

    //Enregistrement de l'étudiant dans la base de donnée
    $etudiant->saveEtudiant();

    $listeTemp = new ListeTemp($_POST['univName']);

    //On enregistre l'étudiant dans la liste des personnes ayant réserver
    $listeTemp->addMatricule($etudiant->getMatricule());

    header("Location: ../../pages/reserver_chamber.php?success");
}else{
    header("Location: ../../pages/reserver_chamber.php?fail");
}
