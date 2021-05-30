<?php

class Chambre {
    private $number;
    private $univName;
    private $state; //Libre ou Occupee
    private $owner; //Un matricule ou null

    public function __construct($number, $univName){
        $this->number = $number;
        $this->univName = $univName;
    }

    public function save(){
        try{

            require('connect.php');
            $query = $conn->prepare("INSERT INTO Chambre(number,univName,state) VALUES (:number,:univName,:state)");
            $query->bindValue("number",$this->number);
            $query->bindValue("univName",$this->univName);
            $query->bindValue("state","Libre"); //Initialement

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of univName
     */ 
    public function getUnivName()
    {
        return $this->univName;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {

        $this->state = $state;

        if($state != "Libre" || $state != "Occupee") return $this;

        try{

            require('connect.php');
            $query = $conn->prepare("UPDATE Chambre SET state=:state WHERE univName=:univName AND number=:number");
            $query->bindValue("number",$this->number);
            $query->bindValue("univName",$this->univName);
            $query->bindValue("state",$state);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        try{

            require('connect.php');
            $query = $conn->prepare("SELECT owner FROM Chambre WHERE univName=:univName AND number=:number");
            $query->bindValue("number",$this->number);
            $query->bindValue("univName",$this->univName);

            $query->execute();

            $this->owner = $query->fetch(PDO::FETCH_ASSOC)["owner"]; //fetch : Single row

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        try{

            require('connect.php');
            $query = $conn->prepare("UPDATE Chambre SET owner=:owner WHERE univName=:univName AND number=:number");
            $query->bindValue("number",$this->number);
            $query->bindValue("univName",$this->univName);
            $query->bindValue("owner",$owner);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        try{

            require('connect.php');
            $query = $conn->prepare("SELECT state FROM Chambre WHERE univName=:univName AND number=:number");
            $query->bindValue("number",$this->number);
            $query->bindValue("univName",$this->univName);

            $query->execute();

            $this->state = $query->fetch(PDO::FETCH_ASSOC)["state"]; //fetch : Single row

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
 
        return $this->state;
    }
}