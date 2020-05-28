
<?php

$tableName  = $_POST["tableName"];

$post = $_POST;
print_r($post);


$name = $_POST['name'];

echo "name $name";

if ($name == NULL)
   echo "name set";



include_once("connect.php");

$stmt = $conn->prepare("describe " . $tableName);


$stmt->execute();

$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);

//print_r($table_fields);

$action2 = "insert1.php";

$action1 = "";


$postCount = count($post);

echo "<br>postCount $postCount<br>";


//if (!isset($id))
//if ($name == NULL)
if ($postCount < 2)
{
   print("<table border=1>");
//   print("<form action='insert1.php' method='post'>");
   print("<form action='insert.php' method='post'>");

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

else 
{


   echo "after form come here";

   $fieldNames = "";
   $questionMark = "";
   $arr2 = array();

   print_r($post);

   foreach ($post as $key=>$value)
   {

      if ($key == "id" )
      { 

        $fieldNames = " id ";
        $questionMark = " '' ";

      }

     elseif ($key == "tableName" )
     { 
        ;
     }

     elseif ($key == "date_time" )
     { 
         //$date = new DateTime('2000-01-01');
         //echo $date->format('Y-m-d H:i:s');
         $dt = new DateTime();
         //$value = $dt:
         $value = $dt->format('Y-m-d H:i:s');
         $arr2[]=$value;
         $fieldNames = $fieldNames . " , " . $key;
         $questionMark = $questionMark . ", ?";

         

        
     }

     else
     {
        $arr2[]=$value;
        $fieldNames = $fieldNames . " , " . $key;
        $questionMark = $questionMark . ", ?";
     }  


      //print ("<br>key $key");
      //print ("<br>value $value");



   }


   echo "<br>fieldNames $fieldNames<br>";
   echo "questionMark  $questionMark<br><br>";
   echo "arr2 <br>";
   print_r($arr2);

   $insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values(" .  $questionMark . " ) ";
//   $insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( '', ? ) ";




   echo "<br>insert $insert";

   $stmt = $conn->prepare($insert);


   $stmt->execute($arr2);

   print ("<form action='index.php' method='post' >");
//   print ("<form action='listTables.php' method='post' >");      // ok
//   print ("<form action='selectUpdate.php' method='post' >");    // not ok

   print ("<input type='submit' value='back to index' />");

   print ("</form>");





}

?>




