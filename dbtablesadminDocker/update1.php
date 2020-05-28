<?php

$id  = $_GET['id'];
$tableName  = $_GET['tableName'];


//echo "id $id<br >";
include_once("connect.php");
include_once("config.php");





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
//  echo "<br>key $key";
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



echo "fieldNames Â$fieldNames";

$update = "UPDATE " . $tableName . " SET " . $fieldNames  . " where id = $id";

echo "update Â$update<br>";

$stmt = $conn->prepare($update);

print_r($arr2);

$stmt->execute($arr2);

header('Location:index.php');


?>


