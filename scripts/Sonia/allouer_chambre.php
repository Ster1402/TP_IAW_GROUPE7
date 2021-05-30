<?php 
function allouer_chambre($matricule,$univName){
    require('../../pages/connexion_BD/connexion.php');
    $query= $conn->prepare( "SELECT number,state FROM Chambre WHERE univName=:univName");
    $query-> bindValue("univName",$univName);
    $query-> execute ();

    $chambres= $query-> fetchAll(PDO::FETCH_ASSOC);
    $allocation=null;
    foreach($chambres as $chambre){
      if ($chambre["state"]=="Libre"){
          $allocation = $chambre;
      break;
      }
    }
    if ($allocation==null){
        echo "toutes les chambres sont occupees";
    } 
    else {
        $query= $conn->prepare("UPDATE chambre SET state='Occupee', owner=:owner WHERE number=:number,univName=:univName");
        $query-> bindValue('owner', $matricule);
        $query-> bindValue("number", $allocation["number"]);
        $query-> bindValue("univName",$univName);
        $query -> execute();
    }
    echo "$matricule est dans la chambre ". $allocation["number"];
}
 ?>
