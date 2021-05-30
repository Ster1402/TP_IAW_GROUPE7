<?php

require('person.php');

/*
Admin code names initiaux: 
* AdminNgaoundere
* AdminDouala
* AdminBuea
* AdminMaroua
* AdminDschang
* AdminYaounde1
* AdminYaounde2
*/

class Admin extends Person{
    private $idA;
    private $nomCode;
    private $password;
    private $univ;

    private function infoAdminDB($univ)
    {
        /*Connexion a la BD*/
        require("connect.php");

        /* Recuperer le contenu de la table admin*/
        $valeursR = $conn->query('SELECT * FROM Admin');

        /* Verification de correspondance */
        while ($donnees = $valeursR->fetch(PDO::FETCH_ASSOC)) {
            $idADB = $donnees['idA'];
            $nomCodeDB = $donnees['nomCode'];
            $passwordDB = $donnees['password'];

            if ($univ == $donnees['univ']) {
                $this->idA = $idADB;
                $this->nomCode = $nomCodeDB;
                $this->passwordDB = $passwordDB;
                break;
            } 
        }

        $valeursR->closeCursor();
        
    }

    public function __construct($name, $surname, $birthday, $nomCode, $password, $univ)
    {
        if ($name == "") {
            $this->infoAdminDB($univ);
        } else {
            $this->name = $name;
            $this->surname = $surname;
            $this->birthday = $birthday;
            $this->nomCode = $nomCode;
            $this->password = $password;
            $this->univ = $univ;

            if (!Person::$init) {
                Person::$init = true;
                Person::initID();
            }
            Person::$idP++;
            $this->idA = Person::$idP; //Increment ID

        }
    }

    public function saveAdmin(){
        require('connect.php');

        $this->saveInDB();

        try{

            $query = $conn->prepare("INSERT INTO Admin VALUES (:idA,:nomCode,:password,:univ)");
            $query->bindValue("idA",$this->idA);
            $query->bindValue("nomCode",$this->nomCode);
            $query->bindValue("password",$this->password);
            $query->bindValue("univ",$this->univ);
            
            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    /**
     * Get the value of idA
     */ 
    public function getIdA()
    {
        return $this->idA;
    }

    /**
     * Get the value of nomCode
     */ 
    public function getNomCode()
    {
        return $this->nomCode;
    }

    /**
     * Set the value of nomCode
     *
     * @return  self
     */ 
    public function setNomCode($nomCode)
    {
        
        $this->nomCode = $nomCode;

        try{
            require('connect.php');
            $query = $conn->prepare("UPDATE Admin SET nomCode=:nomCode WHERE idA=:idA");
            $query->bindValue("nomCode",$this->$nomCode);
            $query->bindValue("idA",$this->idA);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        try{
            require('connect.php');
            $query = $conn->prepare("UPDATE Admin SET password=:password WHERE idA=:idA");
            $query->bindValue("password",$this->$password);
            $query->bindValue("idA",$this->idA);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

    /**
     * Get the value of univ
     */ 
    public function getUniv()
    {
        return $this->univ;
    }

}