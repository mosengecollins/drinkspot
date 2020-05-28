<?php
$id  = $_GET['id'];
$tableName  = $_GET['tableName'];

$get = $_GET;


include_once("connect.php");
include_once("config.php");

$stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

$getCount = count($get);

echo "<br>getCount $getCount<br>";


//if (!isset($id))
//if ($name == NULL)
if ($getCount < 3)
{

   print ("<table border=1>");
   foreach($arr as  $row) 
   {
      print ("<form action ='update.php' method='get'>");

      print ("<input type='hidden' name = 'tableName' value = $tableName />");


      foreach ($row as $key=>$value)
      {
         print ("<tr><td>");
         print( $key);
         print ("</td><td>");
         print ("<input type='text' name = $key value = $value />");
         print ($value);
         print ("</td></tr>");
      }
      print ("<tr><td>");
      print ("<input type='submit' value='save'/>");
      print ("</td></tr></table>");
      print ("</form>");
   }
}
else
{

   // select
   $stmt = $conn->prepare("select * from " . $tableName . " where id = '$id'");

   $stmt->execute();

   $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);


   $arr1 = $_GET;

   //print_r($arr1);



   $fieldNames = "";
   $questionMark = "";
   $arr2 = array();

   foreach ($arr1 as $key=>$value)
   {
   // echo "<br>key $key";
      if ($key == "id" )
      { 
         $fieldNames = " id  = " . $id;
         $questionMark = " '' ";

      }

      elseif ($key == "tableName" )

      { 

      }




      else
      {

        $arr2[]=$value;
        $fieldNames = $fieldNames . " , " . $key . " = ? ";
        $questionMark = $questionMark . ", ?";
        //     echo "<br> fieldNames $fieldNames";
      }    


   }



   echo "fieldNames  $fieldNames";

   $update = "UPDATE " . $tableName . " SET " . $fieldNames  . " where id = $id";

   echo "update  $update<br>";

   $stmt = $conn->prepare($update);

   print_r($arr2);

   $stmt->execute($arr2);

   print ("<form action='index.php' method='get' >");
//   print ("<form action='listTables.php' method='get' >");      // ok
//   print ("<form action='selectUpdate.php' method='get' >");    // not ok

   print ("<input type='submit' value='back to index' />");

   print ("</form>");


}


?>
