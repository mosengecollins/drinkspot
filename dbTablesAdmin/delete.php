<?php

$id  = $_GET['id'];
$tableName = $_GET['tableName'];

//echo "id $id<br >";

include_once("connect.php");
include_once("config.php");

$stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($arr);



print ("<table border=1>");

foreach($arr as  $row)
{
    print ("<form action ='delete1.php' method='get'>");

    print ("<input  type = text name='tableName' value=$tableName>"); 
    foreach ($row as $key=>$value)
    {
       print ("<tr>");
       print ("<td >");
       print( $key);
       print ("</td>");
       print ("<td >");
       print ($value);
       print ("</td>");
       print ("</tr>");

     }
     print ("<tr>");
     print ("<td >");
     print ("<input type='submit' value='delete'/>");
     print ("</td>");
     print ("</tr>");

     print ("</form>");
     
}
       

print ("</table>");



?>


