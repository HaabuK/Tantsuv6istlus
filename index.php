<?php
require ($_SERVER["DOCUMENT_ROOT"]."/../config.php");
global $yhendus;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("functions.php");

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

