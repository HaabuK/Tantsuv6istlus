<?php

$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY hinne1 ASC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
?>
<body style="flex-direction: row;">
  <div class="taust" style="width:40%;">
  <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Esimene lõik hindamine</h1>
  <table style="width: 80%; position:flex padding-top:-50px;">
  <?php
  while($kask->fetch()){
    if ($hinne1 == 0){
      echo "<tr>
      <th style='background-color:rgba(224, 218, 113, .2); color: #fff; font-weight: bold; width:50%'> $tantsija1 ja $tantsija2 </th> 
      <th style='background-color:rgba(224, 218, 113, .3); width:50%; text-align: center;'>
      <a href='?hinne1_id=$id&hinne1=1'><button class='nupp'><i class='fa fa-home'></i> 1</button></a>
      <a href='?hinne1_id=$id&hinne1=2'><button class='nupp'><i class='fa fa-home'></i> 2</button></a>
      <a href='?hinne1_id=$id&hinne1=3'><button class='nupp'><i class='fa fa-home'></i> 3</button></a>
      <a href='?hinne1_id=$id&hinne1=4'><button class='nupp'><i class='fa fa-home'></i> 4</button></a>
      <a href='?hinne1_id=$id&hinne1=5'><button class='nupp'><i class='fa fa-home'></i> 5</button></a>
      </th>
      </tr><br>";
    }
  }
  ?>
  </table>
  </div>

  <div class="vl" style="border-left: 40px solid rgba(197, 100, 100, .0)"></div>

  <div class="taust" style="width:40%">
  <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Lõigus antud hinded</h1>
  <table style="width: 80%;">
  
  <?php
  $kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY hinne1 DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();

  while($kask->fetch()){
    if ($hinne1 > 0){
      echo "<tr>
      <th style='color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='color: #fff; font-weight: bold;'>Hinne: $hinne1</th>
      <th><a href='?hinne1_id=$id&hinne1=0'><button class='del'><i class='fa fa-home'></i> Eemalda</button></a></th>
      </tr><br>";
    }
  }
  ?>
  </table>
  </div>
</body>