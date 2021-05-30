<?php 

class ListeSelec
{

    private $univ;
    private $matricules; //Array
    private $statuts; //Array

    public function __construct($univ)
    {
        $this->univ = $univ;
        $this->matricules = array();

        try{

            require('connect.php');

            $query = $conn->prepare("SELECT matricule FROM ListeSelec WHERE univ=:univ");
            $query->bindValue("univ",$this->univ);
            $query->execute();

            $results = $query->fetch(PDO::FETCH_NUM);

            if($results){
                $this->matricules = $results;
                var_dump($this->matricules);
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
    public function setMatricules($matricule)
    {
        $this->matricules[count($this->matricules)] = $matricule;

        try{

            require('connect.php');

            $query = $conn->prepare("INSERT INTO ListeSelec VALUES (:univ,:matricule,:status);");
            $status = "Admis";
            if(count($this->matricules) > 10){
                $status = "Attente";
            }

            $query->bindValue("univ",$this->univ);
            $query->bindValue("matricule",$this->matricule);
            $query->bindValue("status",$this->status);

            $query->execute();

            $query = $conn->prepare("DELETE FROM ListeTemp WHERE matricule=:matricule");
            $query->bindValue("matricule",$this->matricule);
            $query->execute();
            
        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }

    /**
     * Get the value of statuts
     */
    public function getStatuts()
    {
        return $this->statuts;
    }

    /**
     * Set the value of statuts
     *
     * @return  self
     */
    public function setStatuts($statut, $matricule)
    {
        try{

            require('connect.php');
            $query = $conn->prepare("UPDATE ListeSelec SET status=:status WHERE univ=:univ AND matricule=:matricule");
            $query->bindValue("univ",$this->univ);
            $query->bindValue("matricule",$matricule);
            $query->bindValue("status",$status);

            $query->execute();

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }

        return $this;
    }
}
?>
