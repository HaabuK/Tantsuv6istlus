<?php
// if(isSet($_REQUEST["lisa_id"])){
//   $hinne1 = isSet($_REQUEST["hinne1"])
//   $kask = $yhendus->prepare("UPDATE tantsuvoistlus SET hinne1 = ?, punkte = hinne1 + hinne2 + hinne3 WHERE id = ?");
//   $kask->bind_param("ii", $_REQUEST["hinne1"], $_REQUEST["lisa_id"]);
//   $kask->execute();
//   header("Location: $_SERVER[PHP_SELF]");
// }
?>
<body>
  <div id="menyykiht">
    <h2><a style="color: black">Paarid:</a></h2>
    <?php
      echo "Vallod"
      // $kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, punkte FROM tantsuvoistlus ORDER BY hinne1 ASC");
      //   $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $punkte);
      //   $kask->execute();
      //   while($kask->fetch()){
      //     echo "<li><h2><a style=\"color: black\"; href='?id=$id'>".
      //     htmlspecialchars($tantsija1)."</a></h2></li>";
      //     }
    ?>
  </div>
  <div id="sisukiht">
    <h2><a style="color: black">Paarid:</a></h2>
    <?php
      echo"Maie"
    ?>
  </div>
</body>