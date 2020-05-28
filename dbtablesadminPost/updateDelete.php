<?php


$id = $_GET["id"];
$tableName = $_GET["tableName"];

//print ("you  choose the record nr $id"); 

print (" delete or update this record, please choose");





print ("<a href='update.php?id=$id&tableName=$tableName'>update</a><br>");
print ("<a href='delete.php?id=$id&tableName=$tableName'>delete</a>");




?>
