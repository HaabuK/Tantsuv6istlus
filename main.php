<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();

if (isset($_REQUEST["addedValue"])){
    ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        Lisati: <?=$_REQUEST["addedValue"]?>
    </div>
<?php
}
?>
<body>
  <h1 style="color: white; text-align: center">Top 5:</h1>
  <table style="width: 60%; margin: 0 auto; background-color: #fff">
  <?php
  $koht = 1;
  while($kask->fetch()){
    // if ($koht > 5){
    //   break
    // }
    // else {
      echo "<tr>
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Paar: $tantsija1 ja $tantsija2 </th> 
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Kokku punkte: $punkte</th>
      <th style='background-color: #333; color: #fff; font-weight: bold;'>Positsioon: $koht</th>
      </tr><br>";
      $koht += 1;
    }
  // }
  ?>
  </table>
</body>