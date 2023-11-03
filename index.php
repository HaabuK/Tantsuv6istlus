<?php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

if ($yhendus->connect_error) {
    die("Database connection failed: " . $yhendus->connect_error);
}
?>
<style>
<?php include 'style.css';
?>
</style>
<?php 
include("header.php");

if(isset($_REQUEST["page"])){
    include($_REQUEST["page"].".php");
} else {
    include("main.php");
}

include("footer.php");

$kask=$yhendus->prepare("SELECT id FROM tantsuvoistlus");
  $kask->bind_result($id);
  $kask->execute();


?>
