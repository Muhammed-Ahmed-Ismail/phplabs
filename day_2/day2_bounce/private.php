<?php
session_start();
if(isset($_SESSION["login"]))
{
    if ($_SESSION["login"]==true)
    {
        echo "private area";
    }
}else{
    $login=file_get_contents("/home/muhammed/iti/php/phplabs/phplabs/day2_bounce/log_in.html");
    echo "<h1>you must log in from here</h1>";
    echo $login;

}
?>