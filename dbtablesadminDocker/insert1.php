<?php

//echo "<br>begin<br>";


$tableName = $_GET["tableName"];
//echo "tableName $tableName";

$arr1 = $_GET;
//print_r($arr1);


include_once("connect.php");

$fieldNames = "";
$questionMark = "";
$arr2 = array();

foreach ($arr1 as $key=>$value)
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


  else
  {
     $arr2[]=$value;
     $fieldNames = $fieldNames . " , " . $key;
     $questionMark = $questionMark . ", ?";
  }    


} 

//echo "<br>fieldNames $fieldNames<br>";
//echo "questionMark  $questionMark<br>";
//print_r($arr2);


//echo "tableName $tableName";

$insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( " . $questionMark . ")";

//echo "<br>insert $insert";


$stmt = $conn->prepare($insert);


$stmt->execute($arr2);


header('Location:index.php?tableName=' . $tableName);

?>








