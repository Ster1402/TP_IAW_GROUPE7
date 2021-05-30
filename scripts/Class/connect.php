<?php

try {

    //Information de connection
    $username = 'Groupe7';
    $password = 'groupe7iaw';
    $dbname = 'universitycities';
    $host = 'localhost';
    $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8;';

    $conn = new PDO($dsn,$username,$password,array(PDO::ATTR_PERSISTENT => true));

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $error ) {
    //die("Erreur : ".$error->getMessage());
}