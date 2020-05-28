<?php

$id  = $_POST['id'];
$tableName = $_POST['tableName'];

echo "id $id<br >";

include_once("connect.php");
include_once("config.php");

$stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($arr);



print ("<table border=1>");

foreach($arr as  $row)
{
    print ("<form action ='delete1.php' method='post'>");
    print ("<input  type = hidden name='id' value=$id>");
    print ("<input  type = hidden name='tableName' value=$tableName>"); 
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


