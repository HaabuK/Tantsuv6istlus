<?php
if(isSet($_REQUEST["lisa_id"])){
  $hinne1 = isSet($_REQUEST["hinne1"])
  $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne1 = ?, punkte = hinne1 + hinne2 + hinne3 WHERE id = ?");
  $kask->bind_param("ii", $_REQUEST["hinne1"], $_REQUEST["lisa_id"]);
  $kask->execute();
  header("Location: $_SERVER[PHP_SELF]");
}
?>
<body>
  <div class="menyykiht">
    <h2><a style="color: black">Paarid:</a></h2>
    <?php
      $kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, punkte FROM tantsuvoistlus ORDER BY hinne1 ASC");
      $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $punkte);
      $kask->execute();
      while($kask->fetch()){
        $paar = $tantsija1." ja ".$tantsija2;
        if ($hinne1 == 0){
        echo "<li><h2><a style=\"color: black\"; href='?id=$id'>".
        htmlspecialchars($paar)."</a></h2></li>";
        }
        else {
          for(1){
            echo "<hr><li><h2><a style=\"color: black\"; href='?id=$id'>".
            htmlspecialchars($paar)."</a></h2></li>";
          }
          else{
            echo "<li><h2><a style=\"color: black\"; href='?id=$id'>".
            htmlspecialchars($paar).": "
            htmlspecialchars($hinne1)."</a></h2></li>";
          }
        }
    }
    ?>
  </div>
  <div class="sisukiht">
    <?php
    if(isSet($_REQUEST["id"])){
      $kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, punkte FROM tantsuvoistlus WHERE id=?");
      $kask->bind_param("i", $_REQUEST["id"]);
      $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $punkte);
      $kask->execute();
      if($kask->fetch()){
        $paar = $tantsija1." ja ".$tantsija2;
        echo "<h2>".htmlspecialchars($paar)."</h2>";
        echo "punkte kokku:"htmlspecialchars($punkte)."<br><br>";
        ?>
        <td><a href='?lisa_id=$id&hinne1=1'><button class="btn"><i class="fa fa-home"></i> 1</button></a></td>
        <?php
      } else {
      echo "Vigased andmed.";
      }
    }else {
      echo "Vali võistluspaar";
    } 
    ?>
  </div>
</body>