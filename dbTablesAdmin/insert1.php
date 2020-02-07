<?php

/*
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$address = $_GET['address'];
$email = $_GET['email'];

echo "firstName $firstName";
*/

$tableName = $_GET["tableName"];
echo "tableName $tableName";
$arr1 = $_GET;

//echo "<br>begin<br>";
print_r($arr1);

/*

foreach($arr1 as $key=>$value)
{
   print ("<br> key $key");
   print ("<br>value $value");

}
*/

include_once("connect.php");
//include_once("config.php");

$fieldNames = "";
$questionMark = "";
$arr2 = array();

foreach ($arr1 as $key=>$value)
{
//  if ($key != 'id' )
  echo "<br>key $key";
  if ($key == "id" )
//  if ($key != 'id' or $key != 'tableName')
  { 

     $fieldNames = " id ";
     $questionMark = " '' ";

/*

     $arr2[]=$value;
  //   print ($key);
     $fieldNames = $fieldNames . " , " . $key;
     $questionMark = $questionMark . ", ?";
*/
  }
  
//  if ($key != 'id' )
  elseif ($key == "tableName" )
//  if ($key != 'id' or $key != 'tableName')
  { 
/*
     $arr2[]=$value;
  //   print ($key);
     $fieldNames = $fieldNames . " , " . $key;
     $questionMark = $questionMark . ", ?";
*/
  }


  else
  {
/*
     $fieldNames = " id ";
     $questionMark = " '' ";
*/
     $arr2[]=$value;
     $fieldNames = $fieldNames . " , " . $key;
     $questionMark = $questionMark . ", ?";
     echo "<br> fieldNames $fieldNames";
  }    


} 

//echo "<br>fieldNames $fieldNames<br>";
//echo "questionMark  $questionMark<br>";
print_r($arr2);


//echo "tableName $tableName";

$insert = "insert into " . $tableName . " ( "  . $fieldNames . " ) values( " . $questionMark . ")";

echo "<br>insert $insert";


//$insert = "insert into drinks ( "  . $fieldNames . " ) values( " . $questionMark . ")";
//$insert = "insert into " . $tableName . " ( " . " . $fieldNames . " ) values( " . $questionMark . ")";
//$insert = "insert into student (firstName, lastName, address, email) values(?,?,?,?)";
//$insert = "insert into student ('firstName') values(?)";
//$insert = "insert into student ('firstName') values(?)";
//$insert = "insert into student values('',?,?,?,?)";

//echo "insert $insert<br>";

$stmt = $conn->prepare($insert);
//$stmt = $conn->prepare("insert into student (firstName, lastName, address, email) values(?,?,?,?)");

//echo "before for aech<br>";
/*
foreach($arr1 as $key => $value)
{
    print ("<br>");     
    print ($key);
    print ($value);
}
 
*/

//echo "firstName $firstName";

//$stmt->execute(Ã['aaaa'] );





//$stmt->execute([$firstName, $lastName, $address, $email ] );
print_r($arr2);
$stmt->execute($arr2);


//$stmt->execute($arr1);

//echo "header('Location:index.php')";
header('Location:index.php?tableName=' . $tableName);

?>








