<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();


?>

<body>
<h1 class="pealkiri">Edetabel:</h1>
  <div class="taust" style="height: 70%">
    <div class="sisu" style="height:60%;">
      <table class="tabel" style="width:100%; height:50%;">
      
      <?php
        echo "<tr>
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'>Võistluspaar </th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'>Kokku punkte</th>
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'>Positsioon</th>
        </tr><br>";
      $koht = 1;
      while($kask->fetch()){
        if ($koht == 1){
          echo "<tr>
          <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold;'>$tantsija1 ja $tantsija2 </th> 
          <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold; text-align: center;'>$punkte</th>
          <th style='background-color:rgba(179, 160, 33, .5); color: #fff; font-weight: bold; text-align: center;'>$koht</th>
          </tr><br>";
          $koht += 1;
        }
        else if ($koht == 2){
          echo "<tr>
          <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold;'>$tantsija1 ja $tantsija2 </th> 
          <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold; text-align: center;'>$punkte</th>
          <th style='background-color:rgba(124, 124, 124, .5); color: #fff; font-weight: bold; text-align: center;'>$koht</th>
          </tr><br>";
          $koht += 1;
        }
        else if ($koht == 3){
          echo "<tr>
          <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold;'>$tantsija1 ja $tantsija2 </th> 
          <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold; text-align: center;'>$punkte</th>
          <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold; text-align: center;'>$koht</th>
          </tr><br>";
          $koht += 1;
        }
        else{
          echo "<tr>
          <th style='color: #fff; font-weight: bold;'>$tantsija1 ja $tantsija2 </th> 
          <th style='color: #fff; font-weight: bold; text-align: center;'>$punkte</th>
          <th style='color: #fff; font-weight: bold; text-align: center;'>$koht</th>
          </tr><br>";
          $koht += 1;
          }
        }
        $koht = $koht - 1;
      ?>
      </table>
    </div>
    <div class="pais">
      <?php
      echo "<h2 style='position: fixed; color: black; text-align: left;'>Registreerunuid kokku: $koht</h2> "
      ?>
    </div>
  </div>
</body>
<?php
$yhendus->close();
?>