
<html>
<head>
    <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/views/styles/css/tables-style.css">
</head>

<?php
var_dump($_SESSION);
$dpc=new DatabaseConnector();
$limit=$dpc->getItemsCount();
$index=($index>$limit)?$limit-_Pager_size_:$index;
$next=$index+_Pager_size_;
$prev=($index-_Pager_size_)>=0? $index-_Pager_size_:0;
$items=$dpc->getItems($index);

echo "<table>";
echo "<tr> <th>Name</th> <th>price</th> <th> image</th> <th>details</th> </tr>";
foreach ($items as $item)
    {
        $itemId=$item->id;
        $itemSumbnl="../Resources/images/".substr($item->Photo,0,2)."tz.png";
        echo "<tr> <td>".$item->product_name."</td>";
        echo "<td>".$item->list_price."</td>";
        echo "<td> <img src=\"$itemSumbnl\"> </td>";
        echo "<td> <a href='details.php?id=$itemId'>details</a> </td>";
    }
echo "</table>";
if($index!=0)
{
    echo "<a href='private.php?index=$prev'> << prev  </a>:";
}
if($next<$limit){
echo ":<a href='private.php?index=$next'> next >> </a>";}
echo "<a href='uploadpage.php'> upload new glass </a>"
?>

</html>