<?php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;

?>
<style>
<?php include 'style.css';
?>
</style>
<?php 

require("functions.php");

include("header.php");

if(isset($_REQUEST["page"])){
    include($_REQUEST["page"].".php");
} else {
    include("main.php");
}

include("footer.php");

