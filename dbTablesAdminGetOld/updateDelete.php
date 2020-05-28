<?php


$id = $_POST["id"];
$tableName = $_POST["tableName"];

//print ("you  choose the record nr $id"); 

print (" delete or update this record, please choose");

print ("<form action='update.php' method='post' >");
print ("<input type='hidden' name='id' value=$id >");
print ("<input type='hidden' name='tableName' value=$tableName >");
print ("<input type=submit value='update'>");
print ("</form>");

print ("<form action='delete.php' method='post' >");
print ("<input type='hidden' name='id' value=$id >");
print ("<input type='hidden' name='tableName' value=$tableName >");
print ("<input type=submit value='delete'>");
print ("</form>");



//print ("<a href='update.php?id=$id&tableName=$tableName'>update</a><br>");
//print ("<a href='delete.php?id=$id&tableName=$tableName'>delete</a>");




?>
