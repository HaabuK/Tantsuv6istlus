<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte, finishis FROM tantsuvoistlus ORDER BY punkte DESC LIMIT 3");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte, $finishis);
  $kask->execute();
?>

<body style=" background-image: url('poodium.jpg');">
  <h1 class="pealkiri" style="background-color: rgba(179, 160, 33, .5); color:navy; position:fixed; top:5%;">Auhinnalistel kohtadel olevad paarid</h1>
  <?php
  $koht = 1;
  while($kask->fetch()){
    if ($hinne1 > 0 && $hinne2 > 0 && $hinne3 > 0 && $finishis == 1){
      if ($koht == 1){
        echo "<div style='position:fixed; top:25%; width:350px;'>
        <a style='color:rgba(179, 160, 33); font-size:50px; font-weight: bold;'>$tantsija1 ja $tantsija2 </a> <br>
        <a style='color:rgba(179, 160, 33); font-size:40px; font-weight: bold;'>Punkte: $punkte</a> <br>
        <a style='color:rgba(179, 160, 33); font-size:25px; font-weight: bold;'> $hinne1 | $hinne2 | $hinne3</a></div>";
        $koht += 1;
      }
      else if ($koht == 2){
        echo "<div style='position:fixed; top:40%; left:15%; width:350px;'>
        <a style='color:rgba(124, 124, 124); font-size:50px; font-weight: bold;'>$tantsija1 ja $tantsija2 </a> <br>
        <a style='color:rgba(124, 124, 124); font-size:40px; font-weight: bold;'>Punkte: $punkte</a> <br>
        <a style='color:rgba(124, 124, 124); font-size:25px; font-weight: bold;'> $hinne1 | $hinne2 | $hinne3</a></div>";
        $koht += 1;
      }
      else if ($koht == 3){
        echo "<div style='position:fixed; top:48%; right:15%; width:350px;'>
        <a style='color:rgba(125, 67, 16); font-size:50px; font-weight: bold;'>$tantsija1 ja $tantsija2 </a> <br>
        <a style='color:rgba(125, 67, 16); font-size:40px; font-weight: bold;'>Punkte: $punkte</a> <br>
        <a style='color:rgba(125, 67, 16); font-size:25px; font-weight: bold;'> $hinne1 | $hinne2 | $hinne3</a></div>";
        $koht += 1;
      }
    }
  }
  ?>
</body>
<?php
$yhendus->close();
?>