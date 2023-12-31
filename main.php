<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();

if (isset($_REQUEST["addedValue"])){
    ?>
    <div class="alert" style="position:fixed; top:10%; left:10%;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        Registreerus paar: <?=$_REQUEST["addedValue"]?>
    </div>
<?php
}
?>
<h1 class="pealkiri" style="position:fixed; top:10%;">Tantsuvõistlus:</h1>
<body style="flex-direction: row;">
  <div class="taust" style="width:40%">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Üritusest</h1>
    </div>
    <div class="sisu" style="justify-content:center; align-items: center;">
      <h2 style="width: 80%; height: 80%;">Meie iga-aastane Hambo Maraton toimub see aasta Tartumaa käänuliste maastike vahel.
      Võta kaasa pere, sõbrad ja hea tuju ning veeda üks päikseline päev koos särtsakate
      tantsuliigutuste, hea muusika ning maitsva kohaliku toiduga.</h2>
    </div>
  </div>

  <div class="taust" style="overflow: hidden; padding: 20px; height:8%; width: auto; position:fixed; bottom:10%; align-items: center; justify-content:center;">
      <h2>Osalustasu:  Täiskasvanud: 30€,  Lapsed ja Eakad: 15€,  Õpilased: 20€ (Hind sisaldab toitlustust)</h2>
    </div>

  <div class="vl" style="border-left: 40px solid rgba(197, 100, 100, .0)"></div>

  <div class="taust" style="width:40%;">
    <div class="pais">
    <h1 style="position: absolute; color: black; text-align: center; margin-bottom -20%">Top 5 võistluspaari</h1>
    </div>
    <div class="sisu">
      <table class="tabel">
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
        <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
        <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
        <th style='background-color:rgba(125, 67, 16, 0.5); color: #fff; font-weight: bold;'>Positsioon: $koht</th>
        </tr><br>";
        $koht += 1;
      }
      else if($koht < 6){
        echo "<tr>
        <th style='color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
        <th style='color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
        <th style='color: #fff; font-weight: bold;'>Positsioon: $koht</th>
        </tr><br>";
        $koht += 1;
      }
    }
    while ($koht < 6){
      echo "<tr>
      <th style='color: #fff; font-weight: bold;'></th> 
      <th style='color: #fff; font-weight: bold;'></th>
      <th style='color: #fff; font-weight: bold;'></th>
      </tr><br>";
      $koht += 1;
    }
    ?>
    </table>
    </div>
  </div>
</body>
<?php
$yhendus->close();
?>