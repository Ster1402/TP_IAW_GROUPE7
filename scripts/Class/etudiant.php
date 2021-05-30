<?php /*
        NDE TSAPI STEVE-ROLAND : 18A029FS
      */
?>

<?php require('person.php');

    class Etudiant extends Person {
        private $idE; // References person

        private $matricule;
        private $filiere;
        private $niveau;

        public function __construct($name, $surname, $birthday, $matricule, $filiere, $niveau){
            if (!Person::$init) {
                    Person::$init = true;
                    Person::initID();
            }

            $this->name = $name;
            $this->surname = $surname;
            $this->birthday = $birthday;

            $this->matricule = $matricule;
            $this->filiere = $filiere;
            $this->niveau = $niveau;

            Person::$idP++;
            $this->idE = Person::$idP; //Increment ID
        }
        
        public function saveEtudiant(){
            
            require('connect.php');

            //Save Person in DB
            $this->saveInDB();

            try{

                $query = $conn->prepare("INSERT INTO etudiants(idE,matricule,filiere,niveau) VALUES (:idE,:matricule,:filiere,:niveau) ");
                $query->bindValue("idE",$this->idE);
                $query->bindValue("matricule",$this->matricule);
                $query->bindValue("filiere",$this->filiere);
                $query->bindValue("niveau",$this->niveau);

                $query->execute();

            }catch(PDOException $error ) {
                die("Erreur : ".$error->getMessage());
            }
        }


        /**
         * Get the value of matricule
         */ 
        public function getMatricule()
        {
                return $this->matricule;
        }

        /**
         * Set the value of matricule
         *
         * @return  self
         */ 
        public function setMatricule($matricule)
        {
                $this->matricule = $matricule;

                return $this;
        }

        /**
         * Get the value of filiere
         */ 
        public function getFiliere()
        {
                return $this->filiere;
        }

        /**
         * Set the value of filiere
         *
         * @return  self
         */ 
        public function setFiliere($filiere)
        {
                $this->filiere = $filiere;

                return $this;
        }

        /**
         * Get the value of niveau
         */ 
        public function getNiveau()
        {
                return $this->niveau;
        }

        /**
         * Set the value of niveau
         *
         * @return  self
         */ 
        public function setNiveau($niveau)
        {
                $this->niveau = $niveau;

                return $this;
        }

        /**
         * Get the value of idE
         */ 
        public function getIdE()
        {
                return $this->idE;
        }
    } 