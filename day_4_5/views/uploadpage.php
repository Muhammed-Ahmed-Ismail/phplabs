<?php
session_start();
require_once ($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");

//echo "session";
/*var_dump($_SESSION);
var_dump($_POST);*/
if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]==true && isset($_POST["upload"]))
{

    if($_FILES["glasses-img"]["type"] == "image/png" || $_FILES["glasses-img"]["type"] == "image/jpeg")
    {
        $dpconnector=new DatabaseConnector();
        $connection=$dpconnector->getDbc();
        $connection->table("items")->insert([
                'id'=>5055,
            "Photo"=>$_FILES["glasses-img"]["name"],
            "product_name"=>$_POST["glassname"]
        ]);
        $tempname=$_FILES["glasses-img"]["tmp_name"];

        move_uploaded_file($_FILES["glasses-img"]["tmp_name"],"../Resources/images/".$_FILES["glasses-img"]["name"]);
        echo "<h4> file uploaded successfully";


    }
}
?>
<html>
<body>
<form action="uploadpage.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="glassname" placeholder="Enter the name of the glass">
    <input type="file" name="glasses-img">
    <input type="submit" name="upload" value="upload">
    <a href='private.php'> <<back </a>
</form>
</body>
</html>
