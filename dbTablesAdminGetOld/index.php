<?php

include_once("connect.php");


$stmt = $conn->prepare('show tables');

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($arr);



print ("<table border=1>");


foreach($arr as  $row)
{
     print ("<tr>");

    foreach ($row as $key=>$value)
    {
       print ("<td >");
  
       print ("<form action='selectUpdate.php' method='post' >");
 
       print ("$value");
 
       print ("<input type='hidden' name='tableName' value=$value>"); 
       print ("</td>");
       print ("<td>");
       print ("<input type=submit value='choose me' />");
  

       print ("</td>");
       
       print ("</form>");

     }
     
     print ("</tr>"); 
}
  
print ("</table>");

?>


