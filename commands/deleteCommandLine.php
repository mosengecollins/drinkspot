<!DOCTYPE html>
<html lang="en">
<head>
<title>drinkspot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="commandLine.css" rel="stylesheet" type="text/css">
</head>
<body>
aaaaaaaaaaa
<?php

include_once ("connect.php");

$post = $_POST;
print_r($post);

$idTable = $post['idTable'];
$idUser = $post['idUser'];
$totalCommand = $post['totalCommand'];
$idCommandLast = $post['idCommandLast'];


$id = $post['idCommandLine'];

echo " id $id ";


$delete = " delete from command_line where id = ? ";

$stmt = $conn->prepare($delete);


$arr2[] = $id;
print_r($arr2);

$stmt->execute($arr2);
//$stmt->execute();


echo "idTable $idTable";
//header('Location: http://www.example.com/');
header("Location: commandLine.php?idTable=$idTable&totalCommand=$totalCommand&idCommandLast=$idCommandLast&idUser=$idUser");

/*
print ("<form  action='commandLine.php' method='post' >");
//print("<input type='hidden' name='' value=147>");

   echo "<input type='hidden' name='idTable' value=$idTable />"; 

//   echo "<input type='hidden' name='tableName' value=$tableName />"; 
   echo "<input type='hidden' name='totalCommand' value=$totalCommand />"; 

   echo "<input type='hidden' name='idCommandLast' value=$idCommandLast />"; 
   echo "<input type='hidden' name='idUser' value=$idUser />"; 




print("<input type='submit' value='back to commandLine'>");
print ("</form>");

*/


echo "<br>end delete";
?>
