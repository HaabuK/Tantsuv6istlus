<?php
function clean($userInput) {
  return htmlspecialchars($userInput);
}
if(isSet($_REQUEST["register"])){
    $tantsija1 =clean($_REQUEST["tantsija1"]);
    $tantsija2 =clean($_REQUEST["tantsija2"]);
    $kask=$yhendus->prepare("INSERT INTO tantsuvoistlus(tantsija1, tantsija2) VALUES (?, ?)");
    $kask->bind_param("ss", $tantsija1 , $tantsija2);
    $kask->execute();
    $yhendus->close();
    $paar = $tantsija1." ja ".$tantsija2;
    header("Location: $_SERVER[PHP_SELF]?addedValue=$paar");
    exit();
}
?>
<h1>Tantsupaari registreerimine</h1>
  <div>
  <form method="post" action="?" style="width= 70%; float: center;">
    <label for="tantsija1">Esimene paariline</label>
    <input type="text" id="tantsija1" name="tantsija1" placeholder="Tantsin palju">

    <label for="tantsija2">Teine paariline</label>
    <input type="text" id="tantsija2" name="tantsija2" placeholder="Tantsi ka">
  
    <input type="submit" name="register" value="Salvesta">
  </form>
</div>