<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $tantsija1, $tantsija2, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
?>
<?php 
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
  <h1>Top 5 võistluspaari:</h1>
  <?php
  $koht = 1;
  while($kask->fetch()){
    // if ($koht > 5){
    //   break
    // }
    // else {
      echo "<tr>
      <td style='color: white; padding-right:40px; font-size: 30px'>Paar: $tantsija1 ja $tantsija2 </td> 
      <td style='color: white; padding-right:40px; font-size: 30px'>Kokku punkte: $punkte</td>
      <td style='color: white; padding-right:40px; font-size: 30px'>Positsioon: $koht</td>
      </tr><br>";
      $koht += 1;
    }
  // }
  ?>
</body>
<?php
$yhendus->close();
?>