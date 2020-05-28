<?php

//echo "begin";

include_once("connect.php");
include_once("config.php");

$tableName = $_POST["tableName"];


echo "tableName $tableName";

print("<form action='insert.php' method= 'post' >");

print("<input type='hidden' name='tableName' value=$tableName>");
print("<input type='submit' value='new record'>");


print ("</form>");





$stmt = $conn->prepare('select * from ' .  $tableName);

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($arr);

if ($arr)
{
   print ("<table border=1>");
   foreach($arr as  $row)
   {
      print ("<tr>");

      foreach ($row as $key=>$value)
      {
         print ("<td >");
         print ($value);
         print ("</td>");
      }
   print ("<td >");
   echo "<form action='updateDelete.php' method='post'>";
   echo "<input type='hidden' name=id value=$row[id] />"; 
   echo "<input type='hidden' name=tableName value=$tableName />"; 
   echo "<input type=submit value='update/delete' />";
   echo "</form>"; 
   print ("</td>");
   print ("</tr>");
   }
       

   print ("</table>");
}
else
{
   echo "no record";
}
?>


