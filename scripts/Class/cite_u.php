<?php
/*
*Nom Universités gérées : 
* Ngaoundere
* Yaounde1
* Yaounde2
* Douala
* Dschang
* Buea
* Maroua
*/

class CiteU
{
    private $univName;
    private $totalRoom;
    private $description;


    public function __construct($univName, $description, $totalRoom){
        $this->univName = $univName;
        $this->totalRoom = $totalRoom;
        $this->description = $description;
    }

    public function saveCity(){
        try{

            require('connect.php');
            $query = $conn->prepare("INSERT INTO CiteU VALUES (:univName,:totalRoom,:description);");
            $query->bindValue("univName",$this->univName);
            $query->bindValue("totalRoom",$this->totalRoom);
            $query->bindValue("description",$this->description);
            $query->execute();


        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
    }

    /**
     * Get the value of univName
     */
    public function getUnivName()
    {
        return $this->univName;
    }

    /**
     * Set the value of univName
     *
     * @return  self
     */
    public function setUnivName($univName)
    {
        $this->univName = $univName;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of totalChambre
     */ 
    public function getTotalChambre()
    {
        return $this->totalChambre;
    }

    /**
     * Set the value of totalChambre
     *
     * @return  self
     */ 
    public function setTotalChambre($totalChambre)
    {
        $this->totalChambre = $totalChambre;

        return $this;
    }

    static public function getAll(){
        try{

            require('connect.php');
            $query = $conn->prepare("SELECT univName FROM CiteU");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $error ) {
            die("Erreur : ".$error->getMessage());
        }
 
    }
}


?>
