<?php

$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY hinne3 ASC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
?>
<h1 class="pealkiri" style="position:fixed; top:10%;">Esimene lõik:</h1>
<body style="flex-direction: row;">
  <div class="taust" style="width:40%;">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Hindamine</h1>
    </div>
    <div class="sisu">
      <table class="tabel">
      <?php
        echo "<tr>
        <th class='esimene' style='color: #fff; font-weight: bold; width:50%'> Võistluspaar:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; width:50%; text-align: center;'> Hinne:</th>
        </tr><br>";
      $read = 0;
      while($kask->fetch()){
        if ($hinne3 == 0){
          echo "<tr>
          <th class='vasak'> $tantsija1 ja $tantsija2 </th> 
          <th class='vasak'>
          <a href='?hinne3_id=$id&hinne3=1'><button class='hinne'><i class='fa fa-home'></i> 1</button></a>
          <a href='?hinne3_id=$id&hinne3=2'><button class='hinne'><i class='fa fa-home'></i> 2</button></a>
          <a href='?hinne3_id=$id&hinne3=3'><button class='hinne'><i class='fa fa-home'></i> 3</button></a>
          <a href='?hinne3_id=$id&hinne3=4'><button class='hinne'><i class='fa fa-home'></i> 4</button></a>
          <a href='?hinne3_id=$id&hinne3=5'><button class='hinne'><i class='fa fa-home'></i> 5</button></a>
          </th>
          </tr><br>";
          $read += 1;
        }
      }
      while ($read < 5){
        echo "<tr>
        <th class='vasak'></th> 
        <th class='vasak'>
        </th>
        </tr><br>";
        $read += 1;
      }
      ?>
      </table>
    </div>
  </div>

  <div class="vl" style="border-left: 40px solid rgba(197, 100, 100, .0)"></div>

  <div class="taust" style="width:40%">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Lõigus antud hinded</h1>
    </div>
    <div class="sisu">
      <table style="width: 80%;">
      
      <?php
      $kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY hinne3 DESC");
      $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
      $kask->execute();
        echo "<tr>
        <th class='esimene' style='color: #fff; font-weight: bold;'>Võistluspaar: </th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'>Hinne:</th>
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'>Nulli:</th>
        </tr>";
      $read = 0;
      while($kask->fetch()){
        if ($hinne3 > 0){
          echo "<tr>
          <th style='color: #fff; font-weight: bold;'>$tantsija1 ja $tantsija2 </th> 
          <th style='color: #fff; font-weight: bold; text-align: center;'>$hinne3</th>
          <th style='text-align: center;><a><button class='hinne'><i class='fa fa-home'></i></button></a><a href='?hinne3_id=$id&hinne3=0'><button class='del'><i class='fa fa-home'></i> 0</button></a></th>
          </tr><br>";
          $read += 1;
        }
      }
      while ($read < 5){
        echo "<tr>
        <th style='color: #fff; font-weight: bold; height:60px;'> </th> 
        <th style='color: #fff; font-weight: bold; text-align: center;'></th>
        <th style='color: #fff; font-weight: bold; text-align: center;'></th>
        </tr><br>";
        $read += 1;
      }
      ?>
      </table>
    </div>
  </div>
</body>
<?php
$yhendus->close();
?>