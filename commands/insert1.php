<?php

echo "<br>begin<br>";


$tableName = $_POST["tableName"];
echo "tableName $tableName";
$arr1 = $_POST;

print_r($arr1);


include_once("connect.php");
//include_once("config.php");

$fieldNames = "";
$questionMark = "";
$arr2 = array();

foreach ($arr1 as $key=>$value)
{

  echo "<br>key $key";
  if ($key == "id" )
  { 

     $fieldNames = " id ";
     $questionMark = " '' ";

  }
  
  elseif ($key == "tableName" )
  { 

  }

  else
  {

     $arr2[]=$value;
     $fieldNames = $fieldNames . " , " . $key;
     $questionMark = $questionMark . ", ?";
//     echo "<br> fieldNames $fieldNames";
  }    


} 

echo "<br>fieldNames $fieldNames<br>";
//echo "questionMark  $questionMark<br>";
print_r($arr2);


//echo "tableName $tableName";

$insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( " . $questionMark . ")";

echo "<br>insert $insert";



$stmt = $conn->prepare($insert);

print_r($arr2);
$stmt->execute($arr2);


header('Location:index.php?tableName=' . $tableName);

?>








