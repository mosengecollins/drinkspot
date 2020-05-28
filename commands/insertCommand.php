
<?php



//echo "begin";

//choice the table

////include_once("selectUpdatetablenr.php");


//insert the command record
//include_once("insert1Command.php");

/*


$tableName  = $_POST["tableName"];


include_once("connect.php");

$stmt = $conn->prepare("describe " . $tableName);


$stmt->execute();

$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);

print_r($table_fields);

if (!isset($id))
{
   print("<table border=1>");
   print("<form action='insert1.php'method='post'>");

   print("<input type='hidden' name='tableName' value=$tableName>"); 

   foreach ($fields as  $key=>$value)
   {
      print("<tr>");
      print("<td>");
      print($value);
      print("</td>");
      print("<td>");
      
      if ($value != 'id')
      {
         print("<input type='text' name=$value placeholder='put the value'>");
      }
      else
      {
         print("<input type='hidden' name='id' value='' >");
      }
      
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

*/

//echo "<br>end";
?>




