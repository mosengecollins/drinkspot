<?php

echo "begin insert1Command.php<br>";

//$tableName = $_POST["tableName"];
$tableName = "command";
echo "tableName $tableName";
$arr1 = $_POST;

print_r($arr1);

$idUser = $_POST['idUser'];
$idTable = $_POST['idTable'];
$totalCommand = $_POST['totalCommand'];


include_once("connect.php");
//include_once("config.php");
/*
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
*/


//echo "<br>fieldNames $fieldNames<br>";

//echo "<br>fieldNames $fieldNames<br>";
//echo "questionMark  $questionMark<br>";
//print_r($arr2);



// mistake 
//echo "tableName $tableName";
//$insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( " . $

//$insert = "insert into command values('', 3, 2, 0, 0)";  //ok
$insert = "insert into command values('', $idTable, $idUser, $totalCommand, 'not paid', 0)";

echo "<br>insert $insert";



$stmt = $conn->prepare($insert);

print_r($arr2);

//$stmt->execute($arr2);
$stmt->execute();

$idCommandLast = $conn->lastInsertId(); // return value is an integer

header('Location:commandLine.php?idUser=' . $idUser . '&idTable=' . $idTable . '&totalCommand=' . $totalCommand .'&idCommandLast=' . $idCommandLast );




//echo "<br>end insert1Command.php";
?>
