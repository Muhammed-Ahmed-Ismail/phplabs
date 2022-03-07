<html>

<head>
    <link rel="stylesheet" href="styles/css/itempagestyle.css">
</head>
<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
require_once ("../vendor/autoload.php");

$dpc=new DatabaseConnector();
$item=$dpc->getItemDetails($_GET["id"]);
$itemProductName=$item->product_name;
$itemCode=$item->PRODUCT_code;
$itemPrice=$item->list_price;
$prev=$_SERVER['HTTP_REFERER'];


$photofile="../Resources/images/".$item->Photo;
echo "<table> <tr> <th> info </th> <th>Image</th></tr>";
echo "<tr> <td> <b>product name:</b> $itemProductName </br> <b>product code:</b> $itemCode </br> </b> <b>price:</b>$itemPrice </br> </td>";
echo "<td><img src='$photofile'> </td> </tr> </table>";
echo "<a href='$prev'> << back </a>"
?>

</html>