<?php

include_once("connect.php");


// select
$stmt = $conn->prepare('select * from tb1');

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


print_r($arr);



print ("<table border=1>");

foreach($arr as  $row)
{
     print ("<tr>");

    foreach ($row as $key=>$value)
    {
      print ("<td >");
      //print( $key);
       print ($value);
       print ("</td>");

     }
     
     print ("</tr>");
}
       

print ("</table>");


/*
while ($arr)
{
print ($arr);


   print ("<table border=1>");

   print ("<tr>");
   foreach ($arr as $key => $value)
   {
      echo "{$key} +> {$value}";    
   } 

}
*/
?>


