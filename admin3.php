<?php

$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte, finishis FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte, $finishis);
  $kask->execute();

  if ($tabel == NULL){
    $tabel=3;
  }


?>
<div class="dropdown" style="position:fixed; top:7%; left:3%">
  <button class="dropbtn">Menüü</button>
  <div class="dropdown-content">
    <?php
    echo "$tabel";
    echo "<a href='index.php?page=admin'>Alustavad paarid</a>";
    echo "<a href='index.php?page=admin1'>Rajal paarid</a>";
    echo "<a href='index.php?page=admin2'>Lõpetanud paarid</a>";
    echo "<a href='index.php?page=admin3'>DNF paarid</a>";
    ?>
  </div>
</div>

<h1 class="pealkiri" style="position:fixed; top:5%;">Administraator</h1>
<body style="flex-direction: column; background-color: rgba(43, 14, 14, .9); background-image: none">
<?php if($tabel==3) {
    ?>

  <div class="taust" style="width:95%;height:70%">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Diskvalifitseeritud paarid:</h1>
    </div>
    <div class="sisu" style="width:95%;height: 60%;">
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
        <th class='esimene' style='color: #fff; font-weight: bold; text-align: center;'> Salvesta:</th>
        </tr><br>";
      $read = 0;
      $koht = 0;
      while($kask->fetch()){
        $koht += 1;
        if (($hinne1 ==  0 || $hinne2 == 0 || $hinne3 == 0) && $finishis == 1){
          echo "<tr>
          <form action=? method='POST'>
          <input type='hidden' name='admin_id' value='$id' />
          <input type='hidden' name='tabel' value='$tabel' />
          <th class='vasak'> $id </th> 
          <th class='vasak'><input type='text' name='nimi1' placeholder='$tantsija1' /><input type='text' name='nimi2' placeholder='$tantsija2' /></th> 
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik1' placeholder='$hinne1' /></th>
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik2' placeholder='$hinne2' /></th>
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='5' name='loik3' placeholder='$hinne3' /></th>
          <th class='vasak'> $punkte </th>
          <th class='vasak'>". ($koht)."</th>
          <th class='vasak' ><input type='number' style='width: 50px;' min='0' max='1' name='lopeta' placeholder='$finishis' /></th>
          <th class='vasak'><button class='nupp' type='submit' value='submit'>Salvesta</button></th>
          </form>
          </tr><br>";
          $read += 1;
        }
      }
      while ($read < 5){
        echo "<tr>
        <th class='vasak'></th> 
          <th class='vasak'></th> 
          <th class='vasak' ></th>
          <th class='vasak' ></th>
          <th class='vasak' ></th>
          <th class='vasak'></th>
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