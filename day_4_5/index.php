<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
session_start();
require_once ("vendor/autoload.php");
//echo $_COOKIE["PHPSESSID"];
if(!isset($_SESSION["loggedin"]))
{
    $page="login";

}else
{
    if($_SESSION["loggedin"]==true) {
        $page = "private";
    }else {
        $page="login";
            }
}
require_once ("views/$page.php");