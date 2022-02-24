<?php
session_start();
$_SESSION["login"]=false;
print_r($_POST);
if(isset($_POST["log_in"]))
{
    $users=file("/home/muhammed/iti/php/phplabs/phplabs/day2_bounce/users.txt");

    foreach ($users as $user)
    {
        $userData=explode(",",$user);

        if($_POST["username"]==$userData[0])
        {
            if($_POST["password"]==$userData[1])
            {
                $_SESSION["login"]=true;
            }
        }
    }
    if($_SESSION["login"])
    {
        echo "you are here";
        header("Location: private.php");

    }
    else
    {
        $login=file_get_contents("/home/muhammed/iti/php/phplabs/phplabs/day2_bounce/log_in.html");
        echo "<p style='color: red'> Not regesterd";
        echo $login;
    }
}
?>

