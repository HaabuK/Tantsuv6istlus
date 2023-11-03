<?php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

if(isSet($_REQUEST["uusleht"])){
  $kask = $yhendus->prepare("INSERT INTO tantsuvoistlus (tantsija1, tantsija2, hinne1, hinne2, hinne3, punke) VALUES (?, ?, 0, 0, 0, 0)");
  $kask->bind_param("ss", $_REQUEST["tantsija1"], $_REQUEST["tantsija2"]);
  $kask->execute();
  if (!$kask) {
    die("Error in prepared statement: " . $yhendus->error);
  }
  
  if (!$kask->execute()) {
    die("Error executing prepared statement: " . $kask->error);
  }
  // $paar = $_REQUEST["tantsija1"]." ja ".$_REQUEST["tantsija2"]
  // header("Location: $_SERVER[PHP_SELF]?addedValue=$paar");
  // header("Location: $_SERVER[PHP_SELF]");
  $yhendus->close();
  exit();
  }
?>
<body>
<div id="sisukiht">
<ul>
<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2 FROM tantsuvoistlus");
$kask->bind_result($id, $tantsija1, $tantsija2);
$kask->execute();
  ?>
  <form action=? method='POST'>
  <input type="hidden" name="uusleht" value="jah" />
  <h1>Nimekirja lisamine</h1>
  <dl>
  <dt style="font-size: 30px">Esimene osaleja:</dt>
  <dd>
  <input type="text" name="tantsija1" placeholder="Jüri Ratas"/>
  </dd>
  <dt style="font-size: 30px">Teine osaleja:</dt>
  <dd>
  <input type="text" name="tantsija2" placeholder="Evelin Ilves" />
  </dd>
  </dl>
  <br>
  <button class="nupp" type="submit" value="submit">Registreeru</button>
  </form>
  </div>
</body>
