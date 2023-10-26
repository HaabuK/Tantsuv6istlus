<?php define("TITLE","Avaleht"); ?>
<h1>Tantsuvõistlus</h1>

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
<table>
  <?php
  $kask=$yhendus->prepare("SELECT id, naine, mees, hinne1, hinne2, hinne3, punkte FROM tantsuvoistlus ORDER BY punkte DESC");
  $kask->bind_result($id, $naine, $mees, $hinne1, $hinne2, $hinne3, $punkte);
  $kask->execute();
  echo "<br> Top 5 paari<br>"
  $koht = 1;
  for(5){
  echo "<tr>
  <td style='color: white; padding-right:40px; font-size: 30px'>Paar: $naine ja $mees </td> 
  <td style='color: white; padding-right:40px; font-size: 30px'>Kokku punkte: $punkte</td>
  <td style='color: white; padding-right:40px; font-size: 30px'>Koht: $koht</td>
  </tr>";
  $koht += 1;
  }
  ?>
  </table>
