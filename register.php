<body>
<div class="taust">
<?php
$kask=$yhendus->prepare("SELECT id, tantsija1, tantsija2 FROM tantsuvoistlus");
$kask->bind_result($id, $tantsija1, $tantsija2);
$kask->execute();
  ?>
  <form action=? method='POST'>
  <input type="hidden" name="register" value="jah" />
  <h1>Võistluspaariks registreerimine</h1>
  <hr>
  <br>
  <dl>
  <dt style="font-size: 35px; margin-bottom: 10px;">Esimene paariline</dt>
  <dd>
  <input type="text" name="tantsija1" placeholder="Kalvi Kalle"/>
  </dd>
  <br>
  <dt style="font-size: 35px; margin-bottom: 10px;">Teine Paariline</dt>
  <dd>
  <input type="text" name="tantsija2" placeholder="Viies Käik" />
  </dd>
  </dl>
  <br>
  <br>
  <button class="nupp" type="submit" value="submit">Registreeru</button>
  </form>
  </div>
</body>
