<?php

if(isset($_POST["login"]))
{
    //echo $_POST["username"];
    $isRealUser=Visitor::authenticateVisitor($_POST["username"],$_POST["password"]);
    if($isRealUser)
    {
        $_SESSION["loggedin"]=true;
        //echo "true";
        $_SESSION["username"]=$_POST["username"];
        Counter::checkVisitor($_POST["username"]);
        header("Location: views/private.php");
    }else
    {
        $_SESSION["loggedin"]=false;
    }
}

    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log in </title>
    <link rel="stylesheet" href="views/styles/css/style.css">
</head>
<body>

<center><h1>login</h1></center>


<form name="log_in" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <?php
    if(isset($_POST["login"]))
    {
        if(!$_SESSION["loggedin"])
        {
            echo "<h5 style='color: red'> wrong username or password</h5>";
        }
    }
    ?>

    <input id="username" type="text"name="username" placeholder="User-name" required>

    <input id="password" type="password" name="password" placeholder="password" required>
    <input type="submit" name="login" value="login">


</form>


</body>
</html>
