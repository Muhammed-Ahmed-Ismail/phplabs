<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT']."/day_3/vendor/autoload.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
 echo "<h1> Username:".$_SESSION["username"]."</h1>";

Counter::echoVisitorsNumber();}
else
{
    header("Location:/day_3/index.php");
}
?>