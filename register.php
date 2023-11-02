<?php
if(isSet($_REQUEST["uusleht"])){
  $kask=$yhendus->prepare("INSERT INTO tantsuvoistlus (tantsija1, tantsija2) VALUES (?, ?)");
  $kask->bind_param("ss", $_REQUEST["tantsija1"], $_REQUEST["tantsija2"]);
    if(strlen($_REQUEST["tantsija1"]) != 0 && strlen($_REQUEST["tantsija2"])){
        $kask->execute();
        header("Location: $_SERVER[PHP_SELF]");
        $yhendus->close();
        exit();
    } else{
        header("Location: $_SERVER[PHP_SELF]");
        $yhendus->close();
        exit();
    }
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
  <form action='?'>
  <input type="hidden" name="uusleht" value="jah" />
  <h1>Tantsupaari registreerimine</h1>
            <div style="font-size: 35px">
				Esimene tantsija:
			</div>
  <dl>
  <dt style="font-size: 25px">Ees- ja perekonnanimi:</dt>
  <dd>
  <input style="margin-right: 40px; margin-bottom: 10px; font-size: 25px" type="name" name="tantsija1" label="tantsija1" /><br><br>
  </dd>
            <div style="font-size: 35px">
				Teine tantsija:
			</div>
  <dl>
  <dl>
  <dt style="font-size: 25px">Ees- ja perekonnanimi:</dt>
  <dd>
  <input style="margin-right: 40px; margin-bottom: 10px; font-size: 25px" type="name" name="tantsija2" label="tantsija2" />
  </dd>
  </dl>
  <br>
  <button class="nupp" type="submit" value="sisesta">Saada</button>
  </form>
  <?php

  ?>
  </div>
</body>