<?php



//registreerimine
  if(isSet($_REQUEST["register"])){
  $tantsija1=$_REQUEST["tantsija1"];
  $tantsija2=$_REQUEST["tantsija2"];
  $paar=$tantsija1." ja ".$tantsija2;
  if ($tantsija1 != NULL && $tantsija2 != NULL){
    $kask = $yhendus->prepare("INSERT INTO tantsuvoistlus (tantsija1, tantsija2) VALUES (?, ?)");
    $kask->bind_param("ss", $tantsija1, $tantsija2);
    $kask->execute();
    $yhendus->close();

    header("Location: $_SERVER[PHP_SELF]?addedValue=$paar");
  }
  else {
    header("Location: index.php?page=register");
  }
  exit();
  }




  //hindamine

  if(isSet($_REQUEST["hinne1_id"])){
    $id = $_REQUEST["hinne1_id"];
    $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne1 = ? WHERE id = ?");
    $kask->bind_param("ii", $_REQUEST["hinne1"], $id);
    $kask->execute();

    punkte($yhendus, $id);
    $yhendus->close();

    header("Location: index.php?page=loik1");
    exit();
  }

  if(isSet($_REQUEST["hinne2_id"])){
    $id = $_REQUEST["hinne2_id"];
    $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne2 = ? WHERE id = ?");
    $kask->bind_param("ii", $_REQUEST["hinne2"], $id);
    $kask->execute();

    punkte($yhendus, $id);
    $yhendus->close();

    header("Location: index.php?page=loik2");
    exit();
  }

  if(isSet($_REQUEST["hinne3_id"])){
    $id = $_REQUEST["hinne3_id"];
    $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne3 = ? WHERE id = ?");
    $kask->bind_param("ii", $_REQUEST["hinne3"], $id);
    $kask->execute();

    punkte($yhendus, $id);
    $yhendus->close();

    header("Location: index.php?page=loik3");
    exit();
  }

  function punkte($yhendus, $id) {
    $kask=$yhendus->prepare("SELECT hinne1, hinne2, hinne3, punkte, vana1, vana2, vana3 FROM tantsuvoistlus WHERE id = $id");
    $kask->bind_result($hinne1, $hinne2, $hinne3, $punkte, $vana1, $vana2, $vana3);
    $kask->execute();
    $kask->fetch();

      $punktid = $hinne1 + $hinne2 + $hinne3;
      $vana1 = $hinne1;
      $vana2 = $hinne2;
      $vana3 = $hinne3;

      $kask->close();

      $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET punkte = ?, vana1 = ?, vana2 = ?, vana3 = ? WHERE id = $id");
       $kask->bind_param("iiii", $punktid, $vana1, $vana2, $vana3);
      $kask->execute();

      if ($hinne1 > 0 && $hinne2 > 0 && $hinne3 > 0){
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET finishis = 1 WHERE id = ?");
        $kask->bind_param("i", $id);
        $kask->execute();
      }

  }


  //admin

  if(isSet($_REQUEST["eemalda_id"])){
    // $id = $_REQUEST["eemalda_id"];
    $tabel = $_REQUEST["tabel"];
    $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET finishis = 1 WHERE id = ?");
    $kask->bind_param("i", $_REQUEST["eemalda_id"]);
    $kask->execute();

    $yhendus->close();

    if ($tabel == 0){
      header("Location: index.php?page=admin");
    }
    if ($tabel != 0){
      header("Location: index.php?page=admin$tabel");
    }
    exit();
  }


  if(isSet($_REQUEST["admin_id"])){
    $id = $_REQUEST["admin_id"];
    $nimi1 = $_REQUEST["nimi1"];
    $nimi2 = $_REQUEST["nimi2"];
    $loik1 = $_REQUEST["loik1"];
    $loik2 = $_REQUEST["loik2"];
    $loik3 = $_REQUEST["loik3"];
    $lopeta = $_REQUEST["lopeta"];
    $tabel = $_REQUEST["tabel"];

    muuda($yhendus, $id, $nimi1, $nimi2, $loik1, $loik2, $loik3, $lopeta);
    $yhendus->close();

    if ($tabel == 0){
      header("Location: index.php?page=admin");
    }
    if ($tabel != 0){
      header("Location: index.php?page=admin$tabel");
    }
    
    exit();
    }

    function muuda($yhendus, $id, $nimi1, $nimi2, $loik1, $loik2, $loik3, $lopeta) {
      $kask=$yhendus->prepare("SELECT tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte, vana1, vana2, vana3, finishis FROM tantsuvoistlus WHERE id = $id");
      $kask->bind_result($tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte, $vana1, $vana2, $vana3, $finishis);
      $kask->execute();
      $kask->fetch();
  
        

      if ($tantsija1 != $nimi1 && $nimi1 != NULL) {
        $kask->close();
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET tantsija1 = ? WHERE id = $id");
        $kask->bind_param("s", $nimi1);
        $kask->execute();
      }

      if ($tantsija2 != $nimi2 && $nimi2 != NULL) {
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET tantsija2 = ? WHERE id = $id");
        $kask->bind_param("s", $nimi2);
        $kask->execute();
        
      }

      if ($hinne1 != $loik1 && $loik1 != NULL) {
        $hinne1 = $loik1;
        $kask->close();
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne1 = ? WHERE id = $id");
        $kask->bind_param("i", $loik1);
        $kask->execute();
        
      }

      if ($hinne2 != $loik2 && $loik2 != NULL) {
        $hinne2 = $loik2;
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne2 = ? WHERE id = $id");
        $kask->bind_param("i", $loik2);
        $kask->execute();
        
      }

      if ($hinne3 != $loik3 && $loik3 != NULL) {
        $hinne3 = $loik3;
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne3 = ? WHERE id = $id");
        $kask->bind_param("i", $loik3);
        $kask->execute();
        
      }

      //Finishis muutmine ei tööta millegipärast
      if ($finishis != $lopeta && $lopeta != NULL) {
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET finishis = ? WHERE id = $id");
        $kask->bind_param("i", $lopeta);
        $kask->execute();
        
      }

      if ($hinne1 > 0 && $hinne2 > 0 && $hinne3 > 0){
        $kask->close();
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET finishis = 1 WHERE id = ?");
        $kask->bind_param("i", $id);
        $kask->execute();
      }
      else if ($hinne1 == 0 || $hinne2 == 0 || $hinne3 == 0){
        $kask->close();
        $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET finishis = 0 WHERE id = ?");
        $kask->bind_param("i", $id);
        $kask->execute();
      }
    

      $punktid = $hinne1 + $hinne2 + $hinne3;
      $vana1 = $hinne1;
      $vana2 = $hinne2;
      $vana3 = $hinne3;
      $kask->close();

      $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET punkte = ?, vana1 = ?, vana2 = ?, vana3 = ? WHERE id = $id");
       $kask->bind_param("iiii", $punktid, $vana1, $vana2, $vana3);
      $kask->execute();
  
    }

?>