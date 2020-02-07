
<?php

$tableName  = $_GET["tableName"];


include_once("connect.php");

$stmt = $conn->prepare("describe " . $tableName);


$stmt->execute();

$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);

//print_r($table_fields);

if (!isset($id))
{
   print("<table border=1>");
   print("<form action='insert1.php'method='get'>");

   print("<input type='hidden' name='tableName' value=$tableName>"); 

   foreach ($fields as  $key=>$value)
   {
      print("<tr>");
      print("<td>");
      print($value);
      print("</td>");
      print("<td>"); 
      print("<input type='text' name=$value value='put the value'>"); 
      print("</td>");
   }
   print("</tr>");
   print("<tr>");
   print("<td>"); 
   print("<input type='submit' value='insert' />"); 
   print("</td>");
   print("</tr>");
   print("</form>");
   print ("</table>");





}

?>




