<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
?>

<body>
  <div>
  <h1 style="color: #333; text-align: center;">Edetabel:</h1>
  <table style="border-collapse: collapse; width: 60%; margin: 0 auto;
  ">
  
  <?php
  $koht = 1;
  while($kask->fetch()){
    if ($koht == 1){
      echo "<tr>
      <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
    }
    else if ($koht == 2){
      echo "<tr>
      <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
    }
    else if ($koht == 3){
      echo "<tr>
      <th style='background-color:rgba(90, 52, 18, .5); color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='background-color:rgba(90, 52, 18, .5); color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='background-color:rgba(90, 52, 18, .5); color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
    }
    else{
      echo "<tr>
      <th style='color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
      }
    }
  ?>
</table>
  </div>
</body>
<?php
$yhendus->close();
?>