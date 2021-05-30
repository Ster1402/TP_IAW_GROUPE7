<?php 

abstract class Person {
    //Primary key : AutoIncrement
    static public $idP = 0;
    static public $init = false;

    static public function initID(){
        require('connect.php');

        try{

            $query = $conn->prepare("SELECT idP FROM Personnes");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            
            if($results){
                foreach($results as $r){
                    Person::$idP++;
                }
            }

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    protected $name = "";
    protected $surname = "";
    protected $birthday = ""; //Format YYY-MM-DD

    public function saveInDB(){
        require('connect.php');

        try{

            $query = $conn->prepare("INSERT INTO personnes(idP,name,surname,birthday) VALUES (:idP,:name,:surname,:birthday)");
            $query->bindValue("idP",Person::$idP);
            $query->bindValue("name",$this->name);
            $query->bindValue("surname",$this->surname);
            $query->bindValue("birthday",$this->birthday);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }
}