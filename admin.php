<?php

$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte, finishis FROM tantsuvoistlus ORDER BY hinne1 ASC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte, $finishis);
  $kask->execute();

  $tabel=0;
?>
<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>

<h1 class="pealkiri" style="position:fixed; top:5%;">Võistlejad:</h1>
<body style="flex-direction: column;">
<?php if($tabel==0) {
    ?>

  <div class="taust" style="width:80%;height:70%">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Tantsimas olevad paarid:</h1>
    </div>
    <div class="sisu" style="width:80%;height: 60%;">
      <table class="tabel" style="width:90%;">
      <?php
        echo "<tr>
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> ID:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold;'> Võistluspaar:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Lõik 1:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Lõik 2:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Lõik 3:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Hinne:</th>
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Positsioon:</th> 
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Lõpetanud:</th>
        </tr><br>";
      $read = 0;
      while($kask->fetch()){
        if ($hinne1 == 1 && $finishis == 0){
          echo "<tr>
          <th class='vasak'> $id </th> 
          <th class='vasak'><input type='text' name='nimi1' placeholder='$tantsija1' /><input type='text' name='nimi2' placeholder='$tantsija2' /></th> 
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik1' placeholder='$hinne1' /></th>
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik2' placeholder='$hinne2' /></th>
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik3' placeholder='$hinne3' /></th>
          <th class='vasak'> $punkte </th>
          <th class='vasak'>". ($read+1)."</th>
          <th class='vasak'><a href='?lopetanud_id=$id'><button class='finish0'><i class='fa fa-home'></i> võistlemas</button></a></th>
          </tr><br>";
          $read += 1;
        }
      }
      while ($read < 6){
        echo "<tr>
        <th class='vasak'></th> 
          <th class='vasak'></th> 
          <th class='vasak' ></th>
          <th class='vasak' ></th>
          <th class='vasak' ></th>
          <th class='vasak'></th>
          <th class='vasak'></th>
          <th class='vasak'></th>
        </tr><br>";
        $read += 1;
      }
      ?>
      </table>
    </div>
  </div>
  <?php }
    ?>
</body>
<?php
$yhendus->close();
?>