<!DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>


<?php

echo "<br>begin<br>";


$post = $_POST;
print_r($post);


$tableName = "command_line";
//$tableName = $_POST["tableName"];
echo "tableName $tableName";

$arrGet = $_GET;

echo "<br>arrGet<b>";


print_r($arrGet);



$arr1 = $_POST;


$drink = $arr1['Choice'];

echo "drink $drink";

echo "<br>arr1 (post)<br>";




print_r($arr1);


$idUser = $arr1['idUser'];
$idTable = $arr1['idTable'];
//$idCommandLast = $arr1['idCommandLast'];


$id = $_POST['id'];

// extrat 

//lastid command

$fk_command = $arr1['idCommandLast'];

// idDrink

$idDrink = $arr1['idDrink'];
echo "<br>idDrink $idDrink<br>";

// calculate the subtotal

//$priceDrink = $arr1['Price'];
$priceDrink = $arr1['price'];
$quantity = $arr1['quantity'];

$subtotal = $priceDrink * $quantity;

echo "<br>subtotal $subtotal<br>";


include_once("connect.php");
//include_once("config.php");


/*
//$stmt = $conn->prepare("describe " . $tableName);
$stmt = $conn->prepare("describe ?");


$stmt->execute([$stableName]);

//$fields = $stmt->fetchAll(PDO::FETCH_COLUMN);



//print_r($fields);




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

*/
//echo "tableName $tableName";

//$insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( " . $questionMark . ")";
$insert = "insert into " . $tableName .  "  values( '', $idDrink, $quantity, $subtotal, $fk_command)";

echo "<br>insert $insert";



$stmt = $conn->prepare($insert);

print_r($arr2);
$stmt->execute($arr2);


//header('Location:commandLine.php');
header('Location:commandLine.php?idUser=' . $idUser . '&idTable=' . $idTable . '&totalCommand=' . $totalCommand . '&idCommandLast=' . $fk_command . '&drink=' . $drink);
	


?>

</body>
</html>






