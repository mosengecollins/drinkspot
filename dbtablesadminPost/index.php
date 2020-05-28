<?php

$dt = new DateTime();
$dt1 = $dt->format('Y-m-d H:i:s');
//echo "dt1 $dt12";
print ("<center><h1>date and time : ");
echo $dt->format('Y-m-d H:i:s');
print ("</h1></center>");


include_once("listTables.php");

echo "middle";


include_once("followingPage.php");


?>


