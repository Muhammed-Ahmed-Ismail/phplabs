<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
session_start();
require_once ($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
    $index=(isset($_GET["index"]) && is_numeric($_GET["index"]) && !($_GET["index"]<0)) ? $_GET["index"] : 0;
        echo "<h1> Username:" . $_SESSION["username"] . "</h1>";
        echo $index;
        require_once("tables.php");
}
else
{
    header("Location:/day_3/index.php");
}
?>