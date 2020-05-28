<?php

$id  = $_POST['id'];
$tableName = $_POST['tableName'];

//echo "id $id<br >";

include_once("connect.php");

$post = $_POST;


$stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");

$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


//print_r($arr);


if ($post['inform'] == NULL)
{


   print ("<table border=1>");

   foreach($arr as  $row)
   {
      print ("<form action ='delete.php' method='post'>");
      print ("<input  type = hidden name='id' value=$id>");
      print ("<input  type = hidden name='tableName' value=$tableName>"); 
      print ("<input  type = hidden name='inform' value='inform'>"); 
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

}
else
{

   $sql = "DELETE FROM " . $tableName . " WHERE id = $id";

   $stmt = $conn->prepare($sql);

   $stmt->bindParam(':id', $id, PDO::PARAM_INT);

   $stmt->execute();


   print ("<form action='index.php' method='post' >");
//   print ("<form action='listTables.php' method='post' >");      // ok
//   print ("<form action='selectUpdate.php' method='post' >");    // not ok

   print ("<input type='submit' value='back to index' />");

   print ("</form>");




}


?>


