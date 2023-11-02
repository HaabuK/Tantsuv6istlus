<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
?>

<body>
  <div>
  <h1 style="color: #333; text-align: center;">Edetabel:</h1>
  <table style="border-collapse: collapse; width: 60%; margin: 0 auto; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
  
  <?php
  $koht = 1;
  while($kask->fetch()){
      echo "<tr>
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
    }
  ?>
</table>
  </div>
</body>
<?php
$yhendus->close();
?>