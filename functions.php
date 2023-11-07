<?php
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
    // $hinne=$_REQUEST["hinne1"];
    // $kask=$yhendus->prepare("SELECT hinne1, punkte FROM tantsuvoistlus");
    // $kask->bind_result($hinne1, $punkte);
    // $punkte = $punkte - $hinne1 + $hinne;
    $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne1 = ? WHERE id = ?");
    $kask->bind_param("ii", $_REQUEST["hinne1"], $_REQUEST["hinne1_id"]);
    $kask->execute();
    $yhendus->close();
    header("Location: index.php?page=loik1");
    exit();
  }
?>