<?php 

class ListeTemp
{

    private $univ;
    private $matricules; //Array

    public function __construct($univ)
    {
        $this->univ = $univ;
        $this->matricules = array();

        try{

            require('connect.php');

            $query = $conn->prepare("SELECT matricule FROM ListeTemp WHERE univ=:univ");
            $query->bindValue("univ",$this->univ);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_NUM);

            if($results){
                $this->matricules = $results;
            }

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    /**
     * Get the value of _univ
     */
    public function getUniv()
    {
        return $this->univ;
    }

    /**
     * Get the value of matricules
     */
    public function getMatricules()
    {
        return $this->matricules;
    }

    /**
     * Set the value of matricules
     *
     * @return  self
     */
    public function addMatricule($matricule)
    {
        $this->matricules[count($this->matricules)] = $matricule;

        try{

            require('connect.php');

            $query = $conn->prepare("INSERT INTO ListeTemp VALUES (:univ,:matricule);");

            $query->bindValue("univ",$this->univ);
            $query->bindValue("matricule",$matricule);

            $query->execute();
            
        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

}
?>
