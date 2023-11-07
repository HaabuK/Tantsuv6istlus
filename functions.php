<?php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

//registreerimine
if(isSet($_REQUEST["register"])){
  $tantsija1=$_REQUEST["tantsija1"];
  $tantsija2=$_REQUEST["tantsija2"];
  $paar=$tantsija1." ja ".$tantsija2;
  $kask = $yhendus->prepare("INSERT INTO tantsuvoistlus (tantsija1, tantsija2) VALUES (?, ?)");
  $kask->bind_param("ss", $tantsija1, $tantsija2);
  $kask->execute();
  $yhendus->close();
  header("Location: $_SERVER[PHP_SELF]?addedValue=$paar");
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

      $punktid = $punkte - $vana1 - $vana2 - $vana3 + $hinne1 + $hinne2 + $hinne3; //et ei duubeldaks lahutad vanad puntktid ja siis lisad uued juhul kui nullitud vahepeal
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

?>